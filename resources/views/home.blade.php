<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/js/app.js')
    <style>
       body{
        width: 80%;
        margin:20px auto;
       }
.register,
.login {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 8px solid black;
}

.register h3,
.login h3 {
    font-size: 20px;
    margin: 12px 0;
    text-decoration: underline;
}

.register form,
.login form {
    display: flex;
    flex-direction: column;
    align-self: center;
}

.register form input,
.login form input {
    border: 1px solid black;
    width: fit-content;
    text-align: center;
    margin: 4px 0;
}

.register form label,
.login form label {
    margin-right: 10px;
}

.register form .mr,
.login form .mr {
    margin-right: 30px;
}

.register form button,
.login form button {
    border: 1px solid black;
    width: 100px;
    border-radius: 9px;
    align-self: center;
    margin: 6px 0;
    padding: 4px;
}

.register, .login{
    padding: 50px;
}
.login{
    margin:40px 0;
}

.new-post{
    border: 2px solid black;
    background-color: pink;
    border-radius: 9px;
}
.all-post{
    border: 2px solid black;
    background-color: pink;
    border-radius: 9px;
    margin: 12px 0;
}

.new-post form{
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    justify-items: center;
}
.new-post input,.new-post textarea{
    margin: 12px 0;
}
.new-post button{
    border: 1px solid black;
    width: 100px;
    height: 50px;
    border-radius: 9px;
    align-self: center;
    margin: 12px 0;
    padding: 4px;
    align-self:center;
    cursor: pointer;
    transition: 0.7s all ease-in-out;
}

.new-post button:hover{
background-color:gray;
}

.rg-cont{
    align-items: baseline;
}

.rg-cont p {
    margin-right:10px;
}
    </style>
</head>

<body>
    @auth
    <p>Welcome</p>
    <form action="/logout" method="post">
    @csrf
    <button type="submit" name="logout">logout</button>
    </form>

    <section class="new-post">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="post">
            @csrf
            <label for="">Title</label>
            <input type="text" name ="title" placeholder="post title">
            <textarea name="body" id="" cols="30" rows="10" placeholder="body content..."></textarea>
            <button>Save Post</button>
        </form>
    </section>

    <section class="all-post">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
        <article style="background-color:gray; padding:10px; margin:10px; display:flex; flex-wrap:wrap; justify-content:space-between;">
           <div>
            <h3>{{$post['title']}}</h3>
            {{$post['body']}}
           </div>
            <div class="rg-cont" style=" display:flex; flex-wrap:wrap; justify-content:space-between;">
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
            </form>
            </div>
        </article>
        @endforeach
    </section>
    @else   

    {{-- REGISTER USER --}}
    <section class="register">
        <h3>Register a new User</h3>
        <form action="/register" method="POST">
            @csrf
            <div>
                <label for="">Usename:</label>
                <input type="text" name="name" placeholder="username">
            </div>
            <div>
                <label for="email" class="mr">Email:</label>
                <input type="input" name="email" placeholder="email" autocomplete="off">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="password" autocomplete="off">
            </div>
            <button type="submit" name="submitBtn">Register</button>
        </form>
    </section>
    
    {{-- USER LOGIN --}}
    <section class="login">
        <h3>Login</h3>
        <form action="/login" method="POST">
            @csrf
            <div>
                <label for="">Usename:</label>
                <input type="text" name="loginname" placeholder="username">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="loginpassword" placeholder="password" autocomplete="off">
            </div>
            <button type="submit" name="loginBtn">Login</button>
        </form>
    </section>
    @endauth
</body>

</html>