<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\UseCases\Customer::class,
            \App\Domain\UseCases\CustomerService::class
        );

        $this->app->bind(
            \App\Domain\Interfaces\CustomerRepository::class,
            \App\Repositories\CustomerRepository::class
        );

        $this->app->bind(
            \App\Domain\UseCases\CustomerOutput::class,
            \App\Adapters\Presenters\CustomerJsonPresenter::class
        );

        $this->app->bind(
            \App\Domain\UseCases\Project::class,
            \App\Domain\UseCases\ProjectService::class
        );

        $this->app->bind(
            \App\Domain\Interfaces\ProjectRepository::class,
            \App\Repositories\ProjectRepository::class
        );

        $this->app->bind(
            \App\Domain\UseCases\ProjectOutput::class,
            \App\Adapters\Presenters\ProjectJsonPresenter::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
