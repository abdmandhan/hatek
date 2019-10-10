<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //'name', 'email', 'password','nim','telp','status','instagram','gender','job','company','kajian','title','photo'
    public function run(){
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'nim' => 'J3D'.Str::random(7),
            'telp' => Str::random(10),
            'status' => Str::random(10),
            'instagram' => Str::random(10),
            'gender' => 'Male',
            'job' => Str::random(10),
            'company' => Str::random(10),
            'kajian' => Str::random(10),
            'title' => Str::random(10),
            'photo' => 'male.png',
        ]);
    }
}
