<?php

use App\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                "AreaName" => "الرياض",
                "DeliveryServiceTotal" => 100,
                "PostalCode" => "12234",
                "AvilableFrom" => "12:00:00",
                "AvilableTo" => "00:00:00",
            ],
            [
                "AreaName" => "جدة",
                "DeliveryServiceTotal" => 100,
                "PostalCode" => "!2234",
                "AvilableFrom" => "12:00:00",
                "AvilableTo" => "00:00:00",
            ],
            [
                "AreaName" => "الدمام",
                "DeliveryServiceTotal" => 100,
                "PostalCode" => "!2234",
                "AvilableFrom" => "12:00:00",
                "AvilableTo" => "00:00:00",
            ],
            [
                "AreaName" => "الجريفة",
                "DeliveryServiceTotal" => 100,
                "PostalCode" => "!2234",
                "AvilableFrom" => "12:00:00",
                "AvilableTo" => "00:00:00",
                "SectionNo" => 1
            ],
            [
                "AreaName" => "حي السبيل",
                "DeliveryServiceTotal" => 100,
                "PostalCode" => "!2234",
                "AvilableFrom" => "12:00:00",
                "AvilableTo" => "00:00:00",
                "SectionNo" => 2
            ],
            [
                "AreaName" => "حي القزاز",
                "DeliveryServiceTotal" => 100,
                "PostalCode" => "!2234",
                "AvilableFrom" => "12:00:00",
                "AvilableTo" => "00:00:00",
                "SectionNo" => 3
            ]
        ];

        foreach($areas as $area)
        {
            $area = Area::create($area);
        }

    }
}
