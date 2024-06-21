<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function studentfrom()
    {
        $student = Student::all();

        return view('student', compact('student'));
    }

    public function studentfromsubmit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|max:25|unique:students',
            'mobile' => 'required|string|max:15',
            'institute' => 'required|string|max:25',
            'state' => 'required|string|max:25',
            'district' => 'required|string|max:25',
            'address' => 'required|string',
        ]);

        // Create a new student record
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile = $request->mobile;
        $student->institute = $request->institute;
        $student->state = $request->state;
        $student->district = $request->district;
        $student->address = $request->address;
        $student->save();

        // Redirect to a success page or back to the form with a success message
        return redirect('/student')->with('success', 'Student data saved successfully!');
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect('/student')->with('success', 'Student deleted successfully!');
        } else {
            return redirect('/student')->with('error', 'Student not found!');
        }
    }

    public function editStudent($id)
    {
        // Find the student by ID
        $student = Student::find($id);
        if ($student) {
            return view('edit-student', compact('student'));
        } else {
            return redirect('/student')->with('error', 'Student not found!');
        }
    }
    
    public function updateStudent(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'mobile' => 'required|string|max:15',
            'institute' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Find the student by ID and update
        $student = Student::find($id);
        if ($student) {
            $student->name = $request->name;
            $student->email = $request->email;
            $student->mobile = $request->mobile;
            $student->institute = $request->institute;
            $student->state = $request->state;
            $student->district = $request->district;
            $student->address = $request->address;
            $student->save();

            return redirect('/student')->with('success', 'Student data updated successfully!');
        } else {
            return redirect('/student')->with('error', 'Student not found!');
        }
    }
}
