<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        @extends('layouts.default')
        @section('title', 'Blog - Login')
        @section('content')
        @include('shared._errors')
        <form method="post" action="{{route('session.login')}}">
            {{ csrf_field() }}
            Email:<input type="text" name="email" value="{{old('email')}}" />
            <br/>
            Password:<input type="password" name="password" value="{{old('password')}}" />
            <br/>
            <button type="submit">Login</button>
        </form>
        @stop
    </body>
</html>
