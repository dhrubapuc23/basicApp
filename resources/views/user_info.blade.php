@extends('master')
@section('content1')
    <div class="col-md-6 offset-md-3">
        <form action="{{route('user.submit')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" autocomplete="off">
            </div>
            <input type="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
@endsection