<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $newUrl = " https://cleonmobiledev.page.link/?apn=com.lifemedia.cleon.mobile&link=" . $url;
            return (new MailMessage)
                ->subject('Verifikasi Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $newUrl);
        });
        //
    }
}
