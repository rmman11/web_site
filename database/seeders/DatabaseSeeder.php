<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /*User::create([

            'name' =>'Administartor',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), 
            'phone'  =>'+0489 542 327',
            'address' => 'Romania str Laravel nr 35',
            'role'  =>  'Admin',
        ]);*/
        User::factory(100)->create();

    }
}


