@extends('layouts/app')
@include('partials/navbar')
@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
            @if(session('wrong'))
            <div class="alert alert-danger">
                <ul>
                    {{ session('wrong') }}
                </ul>
            </div>
            @endif
            <br><br>
    <div class="container">
    <h2>Login</h2>
    <form method="POST" action="loginController">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
@endsection


