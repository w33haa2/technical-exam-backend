<?php

use Illuminate\Database\Seeder;
use App\MenuType;

class MenuTypeSeeder extends Seeder
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
                "name" => "Burgers",
            ),
            array(
                "name" => "Beverages",
            ),
            array(
                "name" => "Combo Meals",
            ),
        );

        foreach ($data as $key => $value) {
            MenuType::create($value);
        }
    }
}
