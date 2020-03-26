<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        @extends('layouts.default')
        @section('title', 'Blog - Sign Up')
        @section('content')
        @include('shared._errors')
        <form method="post" action="{{route('user.create')}}">
            {{ csrf_field() }}
            UserName: <input type="text" name="name" value="{{old('name')}}" />
            <br/>
            Email:<input type="text" name="email" value="{{old('email')}}" />
            <br/>
            Password:<input type="password" name="password" value="{{old('password')}}" />
            <br/>
            Confirm Password:<input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" />
            <br/>
            <button type="submit">Sign Up</button>
        </form>
        @stop
    </body>
</html>
