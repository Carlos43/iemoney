<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h3>Register</h3>
        <form action="{{route('register')}}" method="post">
            {{ csrf_field() }}
            UserName:<input type="text" name="username" /><br/>
            Password:<input type="password" name="password" /><br/>
            Password-Confirmation:<input type="password" name="password_confirmation" /><br/>
            Email:<input type="text" name="email" "/><br/>
            Is Admin:<input type="checkbox" name="isAdmin" /><br/>
            <input type="submit" value="Register" />
        </form>
        <h3>Login</h3>
        <form action="{{route('login')}}" method="post">
            {{ csrf_field() }}
            Email:<input type="text" name="email" /><br/>
            Password:<input type="password" name="password" /><br/>
            Remember Me:<input type="checkbox" name="remember" /><br/>
            <input type="submit" value="Login">
        </form>
        <h3>Get Info</h3>
        <form action="{{route('getCurrentInfo')}}" method="get">
            {{ csrf_field() }}
            <input type="submit" value="Get" />
        </form>
        <h3>Logout</h3>
        <form action="{{route('logout')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" value="Logout">
        </form>
        <h3>Get User By Id</h3>
        <form action="{{route('getUserById')}}" method="get">
            {{ csrf_field() }}
            User ID:<input type="text" name="id" /><br/>
            <input type="submit" value="Get" />
        </form>
        <h3>Get User List</h3>
        <form action="{{route('getUserList')}}" method="get">
            {{ csrf_field() }}
            Page:<input type="text" name="page" /><br/>
            UserName:<input type="text" name="username" /><br/>
            <input type="submit" value="Get" />
        </form>
        <h3>Update User</h3>
        <form action="{{route('loginForTestPage')}}" method="get">
            <input type="hidden" name="id" value="1" />
            <input type="submit" value="Login" />
        </form>
        <h3>Delete User By Id</h3>
        <form action="{{route('deleteUserById')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            User ID:<input type="text" name="id" /><br/>
            <input type="submit" value="Delete" />
        </form>
        <h3>Get Followers</h3>
        <form action="{{route('getFollowers')}}" method="get">
            {{ csrf_field() }}
            Page:<input type="text" name="page" /><br/>
            ID:<input type="text" name="id" /><br/>
            <input type="submit" value="Get" />
        </form>
        <h3>Get Followings</h3>
        <form action="{{route('getFollowings')}}" method="get">
            {{ csrf_field() }}
            Page:<input type="text" name="page" /><br/>
            ID:<input type="text" name="id" /><br/>
            <input type="submit" value="Get" />
        </form>
        <h3>Follow</h3>
        <form action="{{route('follow')}}" method="post">
            {{ csrf_field() }}
            User ID:<input type="text" name="userId" /><br/>
            <input type="submit" value="Follow" />
        </form>
        <h3>UnFollow</h3>
        <form action="{{route('unfollow')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            User ID:<input type="text" name="userId" /><br/>
            <input type="submit" value="Unfollow" />
        </form>
        <hr/><hr/><hr/>
        <h3>Get Status List By User ID</h3>
        <form action="{{route('getStatusListByUserId')}}" method="get">
            {{ csrf_field() }}
            Page:<input type="text" name="page" /><br/>
            User ID:<input type="text" name="userId" /><br/>
            <input type="submit" value="Get" />
        </form>
        <h3>Get Status By ID</h3>
        <form action="{{route('getStatusById')}}" method="get">
            {{ csrf_field() }}
            Status ID:<input type="text" name="id" /><br/>
            <input type="submit" value="Get" />
        </form>
        <h3>Create Status</h3>
        <form action="{{route('createStatus')}}" method="post">
            {{ csrf_field() }}
            Content:<input type="text" name="content" /><br/>
            User ID:<input type="text" name="userId" /><br/>
            <input type="submit" value="Create" />
        </form>
        <h3>Delete Status By ID</h3>
        <form action="{{route('deleteStatusById')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            ID:<input type="text" name="id" /><br/>
            <input type="submit" value="Delete" />
        </form>
    </body>
</html>
