<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class CourseStudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();

        $students->each(function ($student) {
            // جلب الكورسات المرتبطة بنفس التراك الخاص بالطالب
            $courses = $student->track->courses;

            if ($courses->count() > 0) {
                // اختر كورسات عشوائية (1 إلى جميع الكورسات)
                $randomCourses = $courses->random(rand(1, $courses->count()));

                // إسناد الكورسات مع درجة عشوائية لكل كورس
                foreach ($randomCourses as $course) {
                    $student->courses()->attach($course->id, [
                        'grade' => rand(50, 100),
                    ]);
                }
            }
        });
    }
}
