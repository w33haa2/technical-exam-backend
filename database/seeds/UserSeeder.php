<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                "name" => "Joseph Joestar",
                "email" => "test@test.com",
                "password" => "123456",
            ),
        );

        foreach ($data as $key => $value) {
            User::create($value);
        }
    }
}
