<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Order matters: roles → kits → users → courses (factory)
        $this->call([
            RoboticsKitSeeder::class,
            UserSeeder::class,
        ]);

        // Create 100 fake courses using the CourseFactory
        Course::factory()->count(100)->create();
    }
}
