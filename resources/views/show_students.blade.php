@extends('master')
@section('content1')
    <div class="col-md-8" style="margin: auto;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Students List</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Semester</th>
                            {{-- <th>Edit</th> --}}
                            {{-- <th>Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->student_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->semester}}</td>
                            {{-- <td><a href="{{url('student/edit/'.$student->id)}}" class="btn btn-primary">Edit</a></td> --}}
                            {{-- <td><a href="{{url('student/delete/'.$student->id)}}" class="btn btn-danger">Delete</a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection