<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create(
            [
                'phone_1' => '055 555 55 55',
                'phone_2' => '055 555 55 55',
                'phone_3' => '055 555 55 55',
                'adress'=>'{"az":"Do ut similique dign az","en":"Non laboris sed id en","ru":"Non laboris sed id ru "}',
                'email' => 'admin@gmail.com',
                'fb' => 'www',
                'ins' => 'www' ,  
                'wp' => 'www' ,  
                'tw' => 'www' ,  
                'ln' => 'www' ,  
            ]);
    }
}
