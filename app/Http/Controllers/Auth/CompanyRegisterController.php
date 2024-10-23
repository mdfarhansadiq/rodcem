<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Company;
use Illuminate\Foundation\Auth\RegistersVendors;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CompanyRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersVendors;


        public function __construct()
    {
        // $this->middleware('auth:super');
    }



    //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = 'login';




    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255', 'unique:companies'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'  => ['required','unique:companies'],
            'category'      => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Company::create([
            'name'          => $data['name'],
            'slug'          => Str::slug($data['name']),
            'email'         => $data['email'],
            'phone_number'  => $data['phone_number'],
            'category'      => $data['category'],
            'password'      => Hash::make($data['password']),
        ]);
    }
}
