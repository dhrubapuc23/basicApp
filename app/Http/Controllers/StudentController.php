<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
}
