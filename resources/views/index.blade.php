<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
        <p>Congrats you are logged in!!</p>
        <form action="/logout">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <div>
            <p>Register</p>
            <form action="/register" method="post">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text"  placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <button>Register</button>
            </form>
        </div>
        <div style="margin-top: 10px;">
            <p>Login</p>
            <form action="/login" method="post">
                @csrf
                <input name="email" type="text"  placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <button>Login</button>
            </form>
        </div>
    @endauth
</body>
</html>