<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\StoreRepository::class,
            \App\Repositories\StoreRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\ProductRepository::class,
            \App\Repositories\ProductRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\ImageRepository::class,
            \App\Repositories\ImageRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\ProductVariantRepository::class,
            \App\Repositories\ProductVariantRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\CategoryRepository::class,
            \App\Repositories\CategoryRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\CityRepository::class,
            \App\Repositories\CityRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\DistrictRepository::class,
            \App\Repositories\DistrictRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\PasswordResetRepository::class,
            \App\Repositories\PasswordResetRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
        
    }
}
