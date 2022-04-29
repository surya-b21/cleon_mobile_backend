<?php

namespace App\Services;

use App\Models\LinkedSocialAccount;
use App\Models\User;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use League\OAuth2\Server\Exception\OAuthServerException;
use Laravel\Socialite\Two\User as ProviderUser;

class SocialUserResolver implements SocialUserResolverInterface
{
    /**
     * Resolve user by provider credentials.
     *
     * @param string $provider
     * @param string $accessToken
     *
     * @return Authenticatable|null
     */
    public function resolveUserByProviderCredentials(string $provider, string $accessToken): ?Authenticatable
    {
        $this->validateProviderName($provider);

        try {
            $providerUser = Socialite::driver($provider)->userFromToken($accessToken);
        } catch (\Throwable $exception) {
            // Send actual error message in development
            if (config('app.debug')) {
                throw $exception;
            }

            return null;
        }

        DB::beginTransaction();
        $user = $this->findOrCreateUser($provider, $providerUser);
        DB::commit();

        return $user;
    }

    protected function validateProviderName($provider)
    {
        if (!in_array(strtolower($provider), $this->getValidProviders(), true)) {
            throw new OAuthServerException(
                sprintf("%s provider is not supported.", ucfirst($provider)),
                Response::HTTP_BAD_REQUEST,
                "unsupported_social_provider",
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    protected function getValidProviders()
    {
        return ['google', 'facebook'];
    }

    /**
     * Create a user if does not exist
     *
     * @param  string  $providerName
     * @param  \Laravel\Socialite\Two\User  $providerUser
     *
     * @return Authenticatable
     * @throws OAuthServerException
     */
    // protected function findOrCreateUser(string $providerName, $providerUser): Authenticatable
    // {
    //     /**
    //      * @var SocialAccount $socialAccount
    //      */
    //     $socialAccount = LinkedSocialAccount::query()->firstOrNew([
    //         'provider_id' => $providerUser->getId(),
    //         'provider_name' => $providerName,
    //     ]);

    //     /**
    //      * So, we found an social account and we are sure that
    //      * a user already exists against this account.
    //      */
    //     if ($socialAccount->exists) {
    //         return $socialAccount->user;
    //     }

    //     /**
    //      * We requires user email from social provider only during sign-up.
    //      * We can allow user to login even if provider did'nt send any email.
    //      */
    //     $this->ensureHasEmailAddress($providerName, $providerUser);

    //     /**
    //      * Lets try to find the user by email address send by provider.
    //      *
    //      * @var User $user
    //      */
    //     $user = User::query()->firstOrNew([
    //         'email' => $providerUser->getEmail(),
    //     ]);

    //     /**
    //      * User not found so lets persist it.
    //      */
    //     if (!$user->exists) {
    //         $user->fill([
    //             'password' => Hash::make(Str::random(30)),
    //         ]);
    //         $user->setEmailAsVerified();
    //         $user->save();

    //         event(new \Illuminate\Auth\Events\Registered($user));
    //     }

    //     /**
    //      * Associate the social account with this user.
    //      */
    //     $socialAccount->user()->associate($user);
    //     $socialAccount->save();

    //     return $user;
    // }

    public function findOrCreateUser(string $provider, ProviderUser $providerUser): User
    {
        print_r($providerUser["id"]);
        $linkedSocialAccount = LinkedSocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();
        if ($linkedSocialAccount) {
            return $linkedSocialAccount->user;
        } else {
            $user = null;
            if ($email = $providerUser->getEmail()) {
                $user = User::where('email', $email)->first();
            }
            if (!$user) {
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                ]);
            }
            $user->linkedSocialAccounts()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);
            return json_encode($user);
        }
    }

    /**
     * Make sure provider sent an email address in response.
     *
     * @param  string  $providerName
     * @param  \Laravel\Socialite\Two\User  $providerUser
     *
     * @return void
     * @throws OAuthServerException
     */
    protected function ensureHasEmailAddress(string $providerName, $providerUser)
    {
        if (empty($providerUser->getEmail())) {
            throw new OAuthServerException(
                sprintf("Could not retrieve email address from %s.", ucfirst($providerName)),
                Response::HTTP_BAD_REQUEST,
                "inaccessible_email_address",
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
