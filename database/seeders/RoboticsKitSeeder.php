<?php

namespace Database\Seeders;

use App\Models\RoboticsKit;
use Illuminate\Database\Seeder;

class RoboticsKitSeeder extends Seeder
{
    public function run()
    {
        $kits = [
            [
                'name'        => 'StarterKit',
                'description' => 'Entry-level kit for Introduction to Robotics and Automation courses.',
            ],
            [
                'name'        => 'Educational Robotics Kit',
                'description' => 'Intermediate kit designed for Programming for Robotics courses.',
            ],
            [
                'name'        => 'Kit5',
                'description' => 'Advanced kit for Characteristics of a Robot and complex builds.',
            ],
        ];

        foreach ($kits as $kit) {
            RoboticsKit::firstOrCreate(['name' => $kit['name']], $kit);
        }
    }
}
