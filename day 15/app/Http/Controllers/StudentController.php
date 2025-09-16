<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }


    function destroy($id)
    {
        $student = Student::findOrFail($id);
        $imagePath = public_path('assets/images/' . $student->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $student->delete();
        return to_route('students.index');
    }

    function create()
    {
        return view('student.create');
    }

    function store(Request $request)
    {
        $requestedData = $request->validate([
            'name'    => 'required|min:3',
            'email'   => 'required|unique:students,email',
            'address' => 'required',
            'gender'  => 'required',
            'age'     => 'required|integer',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ], [
            'name.required'  => 'name is required',
            'name.min'       => 'name must be more than 3 characters',
            'email.unique'   => 'email already exists',
            'address.required' => 'address is required',
            'age.required'   => 'age is required',
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
    return view('student.update', compact('student'));
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
