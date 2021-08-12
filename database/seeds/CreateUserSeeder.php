<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('123456789'),
                'is_admin' => '1'
            ],
            [
                'name' => 'User',
                'email' => 'user@test.com',
                'password' => Hash::make('123456789'),
                'is_admin' => '0'
            ]
        ];
        foreach ($user as $key => $value) {

            User::create($value);
        }
    }
}
