<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beritas')->insert([
            'title' => Str::random(10),
            'body' => Str::random(100),
            'image' => 'male.png',
            'is_show' => 1,
        ]);
    }
}
