<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        @extends('layouts.default')
        @section('title', 'Blog - Home')
        @section('content')
        Home Page
        <br/>
        <a href="{{route('session.login')}}">Login</a>
        <br/>
        <a href="{{route('user.signup')}}">Sign Up</a>
        @stop
    </body>
</html>
