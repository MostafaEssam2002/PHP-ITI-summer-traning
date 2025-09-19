<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Track;
use App\Models\Course;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $tracks = Track::all();

        Student::factory()->count(10)->create()->each(function ($student) use ($tracks) {
            // إسناد تراك عشوائي
            $student->track()->associate($tracks->random())->save();

            // جلب الكورسات المرتبطة بنفس التراك
            $courses = $student->track->courses;

            // إسناد كورسات عشوائية للطالب
            if ($courses->count() > 0) {
                $student->courses()->attach(
                $courses->random(min(2, $courses->count()))->pluck('id')->toArray(),
                ['grade' => rand(50, 100)]
            );

            }
        });
    }
}
