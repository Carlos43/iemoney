<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h3>Update User</h3>
        <form action="{{route('updateUser', $user->id)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            UserName:<input type="text" name="username" value="{{$user->username}}" /><br/>
            Email:<input type="text" name="email" value="{{$user->email}}" /><br/>
            Password:<input type="password" name="password" /><br/>
            Password-Confirmation:<input type="password" name="password_confirmation" /><br/>
            <input type="submit" value="Update" />
        </form>
    </body>
</html>
