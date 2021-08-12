<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'web_name' => "Platform IQ",
            'phone_number' => "+123456789",
            'web_email' => "islam@platformiq.com",
            'address' => "Egypt",
        ]);
    }
}
