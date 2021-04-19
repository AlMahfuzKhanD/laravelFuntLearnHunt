<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    //
    public function student(){
        return view('student.create');
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
        return redirect()->back()->with($notification);
    }
}
