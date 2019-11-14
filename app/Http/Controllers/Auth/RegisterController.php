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
            'gender' => ['required', 'string', 'max:10','in:Male,Female'],
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
        $tahun_masuk= "20".substr($data['nim'],4,2);

        return User::create([
            'name' => $data['name'],
            'nim' => $data['nim'],
            'gender' => $data['gender'],
            'photo' => strtolower($data['gender'].'.png'),
            'email' => $data['email'],
            'angkatan' => $tahun_masuk-1963,
            'is_mahasiswa' => $this->is_mahasiswa($data['nim']),
            'is_tingkat_akhir' => $this->is_tingkat_akhir($data['nim']),
            'password' => Hash::make($data['password']),
        ]);
        
    }

    protected function is_mahasiswa($nim)
    {
        $tahun_masuk= "20".substr($nim,4,2);
        $angkatan = $tahun_masuk-1963;
        $tahun_now = date('Y'); 
        $angkatan_akhir = $tahun_now-1963-2;

        if($angkatan>=$angkatan_akhir) return 1;
        else return 0;
    }

    protected function is_tingkat_akhir($nim)
    {
        $tahun_masuk= "20".substr($nim,4,2);
        $angkatan = $tahun_masuk-1963;
        $tahun_now = date('Y'); 
        $angkatan_akhir = $tahun_now-1963-2;

        if($angkatan==$angkatan_akhir) return 1;
        else return 0;
    }
}
