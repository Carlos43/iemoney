<!DOCTYPE html>
<html>
    <head>
        <title>User Info</title>
    </head>
    <body>
        @extends('layouts.default')
        @section('title', $user->name)
        @section('content')
        {{ Auth::user()->name }}
        UserName: {{$user->name}}
        <br/>
        Email: {{$user->email}}
        <br/>
        <form action="{{route('session.logout')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit">Logout</button>
        </form>
        <hr/>
        @if ($statuses->count() > 0)
        <ul>
            @for($i =0 ; $i<)
             @foreach ($statuses as $status)
             <li>
                 {{ $user->name }} - {{ $status->created_at->diffForHumans() }}
                 <br/>
                 {{ $status->content }}
             </li>
             @endforeach
        </ul>
        @else
            No Status
        @endif
        @stop
    </body>
</html>
