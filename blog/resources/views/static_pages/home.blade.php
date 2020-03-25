<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        @extends('layouts.default')
        @section('content')
        @section('title', 'Blog - Home')
        Home Page
        <a href="{{route('login')}}">Login</a><a href="{{route('signup')}}">Sign Up</a>
        @stop
    </body>
</html>
