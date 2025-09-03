@extends('master')
@section('content1')
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Information</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
                <form action="{{route('student.update',[$student->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$student->student_name}}"  autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$student->email}}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" value="{{$student->semester}}" autocomplete="off">
                </div>
                <input type="submit" class="btn btn-success" value="update">
            </form>
            </div>
        </div>
           
    </div>
@endsection