<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuTypeSeeder::class);
        $this->call(MenuItemSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CouponSeeder::class);
    }
}
