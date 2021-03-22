<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Rizal Gans',
            'email' => 'imam9999@gmail.com',
            'username' => 'immmammm',
            'nrp' => '12345678',
            'role' => '0',
            'password' => bcrypt('password')
        ]);
    }
}
