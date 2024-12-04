<?php

namespace App\Providers;

use App\Events\UserCreatedEvent;
use App\Listeners\SendMessageToLeaderJob;
use App\Listeners\SendsWelcomeNotificationJob;
use App\Listeners\SetupBenefits;
use App\Listeners\SetupPositionJob;
use App\Listeners\SetupSalaryJob;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        Event::listen(UserCreatedEvent::class, [
            SendMessageToLeaderJob::class => 1,
            SendsWelcomeNotificationJob::class => 2,
            SetupPositionJob::class => 3,
            SetupSalaryJob::class => 4,
            SetupBenefits::class => 5,
        ]);
    }
}
