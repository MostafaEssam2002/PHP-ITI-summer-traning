<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Track;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $tracks = Track::all();

        $tracks->each(function ($track) {
            Course::factory()->count(3)->create([
                'track_id' => $track->id
            ]);
        });
    }
}
