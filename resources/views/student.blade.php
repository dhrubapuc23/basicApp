@extends('master')
@section('content1')
    <div class="col-md-4 offset-md-4">
        <h2 class="text-center">Student Information</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('student.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="number" class="form-control" id="semester" name="semester" autocomplete="off">
            </div>
            <input type="submit" class="btn btn-success" value="submit">
        </form>
    </div>
@endsection