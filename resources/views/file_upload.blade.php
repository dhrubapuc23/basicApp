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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File Path</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                    <td scope="row">{{$result->id}}</td>
                    <td>{{$result->file_path}}</td>
                    <td><img src="{{asset($result->file_path)}}" alt="" srcset="" style="width: 50px; height:50px;"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection