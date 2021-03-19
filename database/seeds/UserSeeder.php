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
            'email' => 'rizalihwan94@gmail.com',
            'role' => '0',
            'nrp' => 11806858,
            'password' => bcrypt('password')
        ]);
    }
}
