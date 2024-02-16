<?php
namespace App\Providers\AppUserServices;

use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AppUserServiceIMPL implements AppUserService{
public function printBlack(){
    return "i finally make my service available";
}



   public function createAppUser(Request $request){
 $this->appUserRegistrationValidations($request);

        $appUser = new AppUser();
        $appUser->firstName = $request->input('firstName');
        $appUser->lastName = $request->input('lastName');
        $appUser->email = $request->input('email');
        $appUser->phoneNumber = $request->input('phoneNumber');
        $appUser->password = bcrypt($request->input('password'));

        $appUser->save();
        return response()->json($appUser);
   }

    private function appUserRegistrationValidations(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:app_users,email',
            'phoneNumber' => 'unique:app_users,phoneNumber|min:9|max:15',
            'password' => 'min:5|not_regex:/\s+/',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                throw new \RuntimeException("User with the email -> " . $request->input('email') . " already exists.");
            }
            if ($errors->has('phoneNumber')) {
                throw new \RuntimeException("User with the phone number -> " . $request->input('phoneNumber') . " already exists.");
            }
            if ($errors->has('phoneNumber')) {
                throw new \RuntimeException("Invalid phone number: must be between 9 and 15 characters long.");
            }
            if ($errors->has('email')) {
                throw new \RuntimeException("The email -> " . $request->input('email') . " is an invalid email address.");
            }
            if ($errors->has('password')) {
                throw new \RuntimeException("Password must be at least 5 characters and should not contain spaces.");
            }
        }
    }
}
