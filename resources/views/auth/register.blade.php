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
    <br><br>
    <div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
            @if($errors->first('email'))
            <div class="alert alert-danger">
                <ul>
                    {{ $errors->first('email') }}
                </ul>
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
            @if($errors->first('password'))
            <div class="alert alert-danger">
                <ul>
                    {{ $errors->first('password') }}
                </ul>
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="c_password" name="confirm_password">
            @if($errors->first('confirm_password'))
            <div class="alert alert-danger">
                <ul>
                    {{ $errors->first('confirm_password') }}
                </ul>
            </div>
            @endif
        </div>
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
@endsection


