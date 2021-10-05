<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Validator::extend('currency_password', function ($attribute, $value, $parameters, $validator) {
                $passwordold=Auth::user()->password;
                $newpassword=$value;
                if (Hash::check($newpassword, $passwordold)) {
                        return true;
                    }
                
        }); 

          Validator::extend('roladmin', function ($attribute, $value, $parameters, $validator) {
                    $user=User::where('email',$value)->first();
                   if($user)
                   {
                         if($user->rol != 'user')
                        {
                            return true;
                        }
                   }
                    
                   
        }); 

         
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
