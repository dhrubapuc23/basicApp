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

    public function showData()
    {
        $students = DB::table('students')->paginate(20);
        return view('show_students', ['students' => $students]);
    }

    public function EditData($id)
    {
        $student = DB::table('students')->find($id);
        return view('edit_student', ['student' => $student]);
    }

    public function UpdateData(StudentRequest $request, string $id)
    {
        DB::table('students')->where('id', $id)->update([
            'student_name' => $request->name,
            'email' => $request->email,
            'semester' => $request->semester,
        ]);
        return redirect()->route('student.show')->with('success', 'Student record updated successfully.');
    }

    public function DeleteData(string $id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('student.show')->with('success', 'Student record deleted successfully.');
    }

    public function uploadFile()
    {
        return view('file_upload');
    }

    public function uploadFileStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // max 2MB
        ]);

        $file = $request->file('file');
        $customFileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('/', $customFileName, 'public');
        // Save file path to database
        DB::table('files')->insert([
            'file_path' => $filePath,
        ]);
        return redirect()->route('student.file.upload')->with('success', 'File uploaded successfully.');

        //dd($filePath);

        // if ($request->file('file')->isValid()) {
        //     $filePath = $request->file('file')->store('uploads', 'dir_public');

        //     // Save file path to database
        //     DB::table('files')->insert([
        //         'file_path' => $filePath,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        //     return redirect()->route('student.file.upload')->with('success', 'File uploaded successfully.');
        // }

        // return redirect()->route('student.file.upload')->with('error', 'File upload failed.');
    }
}
