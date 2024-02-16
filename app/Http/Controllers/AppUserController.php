<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Providers\AppUserServices\AppUserService;


class AppUserController extends Controller{
    private $appUserService;

    public function __construct(AppUserService $appUserService){
            $this->appUserService = $appUserService;
    }


    public function printBlank(){
        return $this->appUserService->printBlack();
    }

    public function createAppUser(Request $request)
    {

        try{
 return $this->appUserService->createAppUser($request);
        }catch(Exception $e){
            return "could not create app user ".$e->getMessage();
        }
    }


}