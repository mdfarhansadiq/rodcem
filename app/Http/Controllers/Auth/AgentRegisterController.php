<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Agent;
use Illuminate\Foundation\Auth\RegistersAgents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AgentRegisterController extends Controller
{


    use RegistersAgents;


    //protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('auth:super');
    }


    protected $redirectTo = '/agent/login';


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agents'],
            'phone_number' => ['required', 'string', 'max:255', 'unique:agents'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return Agent::create([
            'name'  => $data['name'], 
            'slug'  => Str::slug($data['name']),
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
