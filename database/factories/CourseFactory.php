<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        // Generate a realistic course key like Rob101 – Rob999
        $courseKey = 'Rob' . $this->faker->unique()->numberBetween(105, 999);

        $roboticsTopics = [
            'Introduction to',
            'Advanced',
            'Fundamentals of',
            'Applied',
            'Principles of',
            'Workshop:',
            'Practicum in',
            'Special Topics in',
        ];

        $subjects = [
            'Robotics', 'Automation', 'Mechatronics', 'Sensors and Actuators',
            'Robot Programming', 'Embedded Systems', 'Computer Vision',
            'Artificial Intelligence for Robots', 'Robot Kinematics',
            'Industrial Automation', 'Control Systems', 'PLC Programming',
            '3D Printing for Robotics', 'Arduino Programming', 'ROS (Robot OS)',
        ];

        $title = $this->faker->randomElement($roboticsTopics) . ' ' . $this->faker->randomElement($subjects);

        return [
            'course_key'  => $courseKey,
            'title'       => $title,
            'cover_image' => 'covers/' . $this->faker->slug(3) . '.jpg',
            'content'     => $this->faker->paragraphs(5, true),
            'kit_id'      => RoboticsKit::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
