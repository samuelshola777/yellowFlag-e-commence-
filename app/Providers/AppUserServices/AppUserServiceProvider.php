<?php

namespace App\Providers\AppUserServices;
use Illuminate\Support\ServiceProvider;
use App\Providers\AppUserServices\AppUserService;
use App\Providers\AppUserServices\AppUserServiceIMPL;

class AppUserServiceProvider extends ServiceProvider{
    public function register(){
$this->app->bind(AppUserService::class, AppUserServiceIMPL::class);
    }

    public function boot(){

    }
}
