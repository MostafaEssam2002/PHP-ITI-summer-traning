<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('student.index', compact('students'));
    }

    // public function show($id)
    // {
    //     $student = Student::findOrFail($id);
    //     return view('student.show', compact('student'));
    // }
    public function show($id)
    {
        $student = Student::with('courses')->findOrFail($id); // ✅ جلب الكورسات مع pivot
        return view('student.show', compact('student'));
    }


    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $imagePath = public_path('assets/images/' . $student->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $student->delete();
        return to_route('students.index');
    }

    public function create()
    {
        $tracks = Track::all(); // ✅ جلب كل التراكات علشان نعرضها في الفورم
        return view('student.create', compact('tracks'));
    }

    public function store(Request $request)
    {
        $requestedData = $request->validate([
            'name'    => 'required|min:3',
            'email'   => 'required|unique:students,email',
            'address' => 'required',
            'gender'  => 'required',
            'age'     => 'required|integer',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'track_id'=> 'required|exists:tracks,id', // ✅ التراك لازم يتبعت ويكون موجود
        ], [
            'track_id.required' => 'Track is required',
            'track_id.exists'   => 'Selected track does not exist',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $requestedData['image'] = $imageName;
        }

        Student::create($requestedData);
        return to_route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $tracks = Track::all(); // ✅ علشان نعرض التراكات في صفحة التعديل
        return view('student.update', compact('student', 'tracks'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $requestedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'unique:students,email,'.$id,
            'address' => 'required',
            'gender' => 'required',
            'age' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'track_id'=> 'required|exists:tracks,id', // ✅ هنا برضه
        ]);

        if ($request->hasFile('image')) {
            if ($student->image && file_exists(public_path('assets/images/'.$student->image))) {
                unlink(public_path('assets/images/'.$student->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $requestedData['image'] = $imageName;
        }

        $student->update($requestedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
}
