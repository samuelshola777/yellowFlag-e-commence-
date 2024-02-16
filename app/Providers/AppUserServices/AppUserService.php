<?php


namespace App\Providers\AppUserServices;
use Illuminate\Http\Request;
interface AppUserService{

    public function printBlack();

    public function createAppUser(Request $request);
}
