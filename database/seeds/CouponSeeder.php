<?php

use Illuminate\Database\Seeder;
use App\Coupon;

class CouponSeeder extends Seeder
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
                "code" => "JJBA2020",
                "discount" => 5
            ),
            array(
                "code" => "GO2018",
                "discount" => 10
            ),
            array(
                "code" => "STONEOCEAN2020",
                "discount" => 20
            ),
        );

        foreach ($data as $key => $value) {
            Coupon::create($value);
        }
    }
}
