@extends('master')

@section('content1')
    <div class="col-md-8 offset-md-2">
        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession
        <form action="{{route('student.file.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose File</label>
                <input type="file" class="form-control" id="file" name="file"  autocomplete="off">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-success" value="Upload">
        </form>
    </div>
@endsection