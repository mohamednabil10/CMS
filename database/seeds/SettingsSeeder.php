<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Settings::create([
        "blog_name"      =>      'mohamed',
        "phone_number"   =>      '01092202393',
        "blog_email"     =>      'mohamed@gmail.com',
        "address"        =>      'cairo',
        ]);
    }
}
