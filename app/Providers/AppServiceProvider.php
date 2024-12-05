<?php

namespace App\Providers;

use App\Arch\Processes\ProcessesMakeCommand;
use App\Arch\Queries\QueriesMakeCommand;
use App\Arch\Tasks\TaskMakeCommand;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
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

      $this->commands([
          ProcessesMakeCommand::class,
          TaskMakeCommand::class,
          QueriesMakeCommand::class
      ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        Model::unguard();
    }
}
