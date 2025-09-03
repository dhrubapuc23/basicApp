<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->select(['student_name','email','semester'])->get();
        //$student = DB::table('students')->where('semester', 8)->count();
        dd($students);
    }
    public function getcourse()
    {
        $result = DB::table('students')
            ->join('courses', 'students.id', '=', 'courses.student_id')
            ->select('students.student_name','students.email', 'courses.course_name', 'courses.course_code')
            ->get();
        dd($result);
    }
    
    public function create()
    {
        return view('student');
    }

    public function store(StudentRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|min:2|max:50',
        //     'email' => 'required|email',
        //     'semester' => 'required|integer|min:1|max:8',
        // ],
        // [
        //     'name.required' => 'Name is required',
        //     'name.min' => 'Name must be at least 2 characters',
        //     'name.max' => 'Name must not exceed 50 characters',
        //     'email.required' => 'Email is required',
        //     'email.email' => 'Email must be a valid email address',
        //     'semester.required' => 'Semester is required',
        //     'semester.integer' => 'Semester must be an integer',
        //     'semester.min' => 'Semester must be at least 1',
        //     'semester.max' => 'Semester must not exceed 8',
        // ]);
        DB::table('students')->insert([
            'student_name' => $request->name,
            'email' => $request->email,
            'semester' => $request->semester,
        ]);
        //dd('Student record created successfully.');
        return redirect()->route('student.create')->with('success', 'Student record created successfully.');
    }
}
