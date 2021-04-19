<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        # code...
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    public function create(){
        return view('student.create');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('student.view', compact('student'));
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:3',
            'email' => 'required|unique:students',
            'phone' => 'required|max:12|min:9',
            
        ]);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();

        $notification = array(
            'message'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return redirect()->route('all.student')->with($notification);
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        $notification = array(
            'message'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return redirect()->route('all.student')->with($notification);

    }
}
