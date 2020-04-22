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
            ),
            array(
                "code" => "GO2018",
            ),
            array(
                "code" => "STONEOCEAN2020",
            ),
        );

        foreach ($data as $key => $value) {
            Coupon::create($value);
        }
    }
}
