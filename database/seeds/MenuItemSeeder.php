<?php

use Illuminate\Database\Seeder;
use App\MenuItem;

class MenuItemSeeder extends Seeder
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
                "name" => "Hotdog",
                "menu_type_id" => 1,
                "tax" => 1.05,
                "price" => 35
            ),
            array(
                "name" => "Cheese Burger",
                "menu_type_id" => 1,
                "tax" => 1.35,
                "price" => 45
            ),
            array(
                "name" => "Fries",
                "menu_type_id" => 1,
                "tax" => 1.2,
                "price" => 40
            ),
            array(
                "name" => "Coke",
                "menu_type_id" => 2,
                "tax" => 0.75,
                "price" => 25
            ),
            array(
                "name" => "Sprite",
                "menu_type_id" => 2,
                "tax" => 0.75,
                "price" => 25
            ),
            array(
                "name" => "Tea",
                "menu_type_id" => 2,
                "tax" => 0.6,
                "price" => 20
            ),
            array(
                "name" => "Chicken Combo Meal",
                "menu_type_id" => 3,
                "tax" => 2.1,
                "price" => 70
            ),
            array(
                "name" => "Pork Combo Meal",
                "menu_type_id" => 3,
                "tax" => 2.7,
                "price" => 90
            ),
            array(
                "name" => "Fish Combo Meal",
                "menu_type_id" => 3,
                "tax" => 2.4,
                "price" => 80
            ),
        );

        foreach ($data as $key => $value) {
            MenuItem::create($value);
        }
    }
}
