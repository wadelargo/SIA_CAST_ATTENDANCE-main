<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id'      =>fake()->randomElement(Event::pluck('id')),
            'student_id'    =>fake()->randomElement(Student::pluck('id')),
            'status'        =>fake()->randomElement(['Present','Absent']),
        ];
    }
}
