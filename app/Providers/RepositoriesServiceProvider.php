<?php

namespace App\Providers;

use App\Repositories\Admin\HospitalRepositories;
use App\Repositories\Admin\HospitalRepositoriesInterface;
use App\Repositories\Admin\SpecialtiesRepositories;
use App\Repositories\Admin\SpecialtiesRepositoriesInterface;
use App\Repositories\Admin\UsersRepositories;
use App\Repositories\Admin\UsersRepositoriesInterface;
use App\Repositories\DoktorsRepositories;
use App\Repositories\DoktorsRepositoriesInterface;
use App\Repositories\NotificationsRepositories;
use App\Repositories\NotificationsRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(HospitalRepositoriesInterface::class,HospitalRepositories::class);
        $this->app->bind(SpecialtiesRepositoriesInterface::class,SpecialtiesRepositories::class);
        $this->app->bind(UsersRepositoriesInterface::class,UsersRepositories::class);
        $this->app->bind(DoktorsRepositoriesInterface::class,DoktorsRepositories::class);
        $this->app->bind(NotificationsRepositoriesInterface::class,NotificationsRepositories::class);
    }
}
