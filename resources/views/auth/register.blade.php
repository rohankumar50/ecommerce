@extends('layouts/app')
@include('partials/mainpagenavbar')
@section('content')
    <div class="container">
    <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="c_password" name="c_password">
        </div>
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
@endsection


