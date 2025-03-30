<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
      $students =   DB::table('students')->get();
        return view('admin.student.studentslist', compact('students'));
    }
    public function addstudent(){
        $classes = DB::table('classes')->get();
        return view('admin.student.addstudent', compact('classes'));
    }
    public function addstudentstore(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'student_id' => 'required|unique:students,student_id|numeric|digits_between:4,10',
            'class_id' => 'required',        
        ]);

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'created_at' => now(),
            'updated_at' => now(),
        );

        DB::table('students')->insert($data);
        return redirect()->route('student.list')->with('success', 'Student added successfully');
    }
    public function viewstudent($id){
        $id = Crypt::decryptString($id);
        $student = DB::table('students')->where('id', $id)->first();
        if (!$student) {
            return redirect()->route('student.list')->with('error', 'Student not found');
        }
        return view('admin.student.viewstudent', compact('student'));
    }
    public function deletestudent($id){
        $id = Crypt::decryptString($id);
        $student = DB::table('students')->where('id', $id)->first();
        if (!$student) {
            return redirect()->route('student.list')->with('error', 'Student not found');
        }
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('student.list')->with('success', 'Student deleted successfully');
    }
    public function editstudent($id){
        $id = Crypt::decryptString($id);
        $classes = DB::table('classes')->get();
        $student = DB::table('students')->where('id', $id)->first();
        if (!$student) {
            return redirect()->route('student.list')->with('error', 'Student not found');
        }
        return view('admin.student.editstudent', compact('student', 'classes'));
    }
    public function editstudentstore(Request $request, $id){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'student_id' => 'required|unique:students,student_id,'.$id,
            'class_id' => 'required',
        ]);

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'updated_at' => now(),
        );

        DB::table('students')->where('id', $id)->update($data);
        return redirect()->route('student.list')->with('success', 'Student updated successfully');
    }
}
