<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Track;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index()
    {
        $courses = Course::with(['tracks', 'students'])->paginate(5);
        return view('courses.index', compact('courses'));
    }


    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        $tracks = Track::all();
        $students = Student::all();
        return view('courses.create', compact('tracks', 'students'));
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration' => 'required|string|max:50',
            'track_id' => 'required|exists:tracks,id',
            'students' => 'nullable|array',
            'students.*' => 'exists:students,id',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'track_id' => $request->track_id,
        ]);

        if ($request->has('students')) {
            $course->students()->attach($request->students);
        }

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        $course = Course::with(['track', 'students'])->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit($id)
    {
        $course = Course::with('students')->findOrFail($id);
        $tracks = Track::all();
        $students = Student::all();

        return view('courses.edit', compact('course', 'tracks', 'students'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration' => 'required|string|max:50',
            'track_id' => 'required|exists:tracks,id',
            'students' => 'nullable|array',
            'students.*' => 'exists:students,id',
        ]);

        $course = Course::findOrFail($id);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'track_id' => $request->track_id,
        ]);

        // sync بدل attach عشان يحدث الطلاب بدل ما يكررهم
        if ($request->has('students')) {
            $course->students()->sync($request->students);
        } else {
            $course->students()->detach();
        }

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->students()->detach();
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}


// namespace App\Http\Controllers;

// use App\Models\Course;
// use Illuminate\Http\Request;

// class CourseController extends Controller
// {

//     public function index()
//     {
//         $courses = Course::paginate(3);
//         return view('courses.index', compact('courses'));
//     }

//     public function create()
//     {
//         return view('courses.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'grade' => 'required|string|max:50',
//             'description' => 'nullable|string',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
//         ]);

//         $imageName = null;

//         if ($request->hasFile('image')) {
//             $imageName = time() . '.' . $request->image->extension();
//             $request->image->move(public_path('assets/images'), $imageName);
//         }

//         Course::create([
//             'name' => $request->name,
//             'grade' => $request->grade,
//             'description' => $request->description,
//             'image' => $imageName,
//         ]);

//         return redirect()->route('courses.index')->with('success', 'Course created successfully.');
//     }

//     public function show(Course $course)
//     {
//         return view('courses.show', compact('course'));
//     }

//     public function edit(Course $course)
//     {
//         return view('courses.edit', compact('course'));
//     }

//     public function update(Request $request, Course $course)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'grade' => 'required|string|max:50',
//             'description' => 'nullable|string',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
//         ]);

//         $imageName = $course->image;

//         if ($request->hasFile('image')) {
//             // حذف الصورة القديمة لو موجودة
//             if ($imageName && file_exists(public_path('assets/images/' . $imageName))) {
//                 unlink(public_path('assets/images/' . $imageName));
//             }

//             $imageName = time() . '.' . $request->image->extension();
//             $request->image->move(public_path('assets/images'), $imageName);
//         }

//         $course->update([
//             'name' => $request->name,
//             'grade' => $request->grade,
//             'description' => $request->description,
//             'image' => $imageName,
//         ]);

//         return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
//     }

//     public function destroy(Course $course)
//     {
//         if ($course->image && file_exists(public_path('assets/images/' . $course->image))) {
//             unlink(public_path('assets/images/' . $course->image));
//         }

//         $course->delete();

//         return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
//     }
// }
