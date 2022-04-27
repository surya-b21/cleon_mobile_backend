<?php

namespace App\Services;

use Exception;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\LinkedSocialAccount;
use Laravel\Socialite\Two\User as ProviderUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use League\OAuth2\Server\Exception\OAuthServerException;

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
        $providerUser = null;

        try {
            $providerUser = Socialite::driver($provider)->userFromToken($accessToken);
        } catch (Exception $exception) {
            if (config('app.debug')) {
                throw $exception;
            }

            return null;
        }

        if ($providerUser) {
            DB::beginTransaction();
            $user = $this->findOrCreate($providerUser, $provider);
            DB::commit();

            return $user;
        }
        return null;
    }

    public function findOrCreate(ProviderUser $providerUser, string $provider): Authenticatable
    {
        $socialAccount = LinkedSocialAccount::query()->firstOrNew([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        if ($socialAccount->exists) {
            return $socialAccount->user;
        }

        $this->ensureHasEmailAddress($provider, $providerUser);

        $user = User::query()->firstOrNew([
            'email' => $providerUser->getEmail(),
        ]);

        if (!$user->exists) {
            $user->fill([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
            ]);
            $user->setEmailAsVerified();
            $user->save();

            event(new \Illuminate\Auth\Events\Registered($user));
        }

        $socialAccount->user()->associate($user);
        $socialAccount->save();

        return null;
    }

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
