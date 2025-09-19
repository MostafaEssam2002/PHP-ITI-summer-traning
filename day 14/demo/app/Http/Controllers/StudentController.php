<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('track')->get();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $trackss = Track::all();
        return view('student.create', compact('trackss'));
    }
    public function store(Request $request)
    {
        Student::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'gender'   => $request->gender,
            'tracks_id' => $request->tracks_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $student  = Student::findOrFail($id);
        $trackss = Track::all();
        return view('student.edit', compact('student', 'trackss'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'gender'   => $request->gender,
            'tracks_id' => $request->tracks_id,
        ]);
        return redirect()->route('students.index')->with('success', 'Student Updated Successfully');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully');
    }
    public function show($id)
    {
        $student = Student::with('track')->findOrFail($id);
        return view('student.show', compact('student'));
    }
}
