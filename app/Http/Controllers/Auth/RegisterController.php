<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'nim' => ['required', 'string', 'max:9','min:9'],
            'telp' => ['required', 'string', 'max:20'],
            'status' => ['required', 'string', 'max:10','in:Mahasiswa,Alumni'],
            'gender' => ['required', 'string', 'max:10','in:Male,Female'],
            'instagram' => ['required', 'string', 'max:20','regex:/^\S*$/u'],
            'job' => ['required', 'string', 'max:100'],
            'company' => ['required', 'string', 'max:100'],
            'kajian' => ['required', 'string', 'max:20','in:Hardware,Jaringan,Multimedia'],
            'title' => ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'name' => $data['name'],
            'nim' => $data['nim'],
            'telp' => $data['telp'],
            'status' => $data['status'],
            'gender' => $data['gender'],
            'instagram' => $data['instagram'],
            'job' => $data['job'],
            'company' => $data['company'],
            'kajian' => $data['kajian'],
            'title' => $data['title'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
