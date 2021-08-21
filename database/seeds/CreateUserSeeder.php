<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
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
        foreach ($users as $user_data) {

            $user = User::create($user_data);
            if ($user->profile == null) {
                Profile::create([
                    'user_id'   => $user->id,
                    'image'     => 'default.png',
                    'facebook'  => 'https://www.facebook.com',
                    'twitter'   => 'https://www.twitter.com',
                    'github'    => 'https://www.github.com',
                    'about'     => 'About here',
                ]);
            }
        }
    }
}
