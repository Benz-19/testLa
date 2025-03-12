<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/js/app.js')
    <style>
        .register {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 8px solid black;
        }

        .register h3 {
            font-size: 20px;
            margin: 12px 0;
            text-decoration: underline;
        }

        .register form {
            display: flex;
            flex-direction: column;
            align-self: center;
        }

        .register form input {
            border: 1px solid black;
            width: fit-content;
            text-align: center;
            margin: 4px 0;
        }

        .register form label {
            margin-right: 10px;
        }

        .register form .mr {
            margin-right: 40px;
        }

        .register form button {
            border: 1px solid black;
            width: 100px;
            border-radius: 9px;
            align-self: center;
            margin: 6px 0;
            padding: 4px;
        }
    </style>
</head>

<body>
    <section class="register">
        <h3>Register a new User</h3>
        <form action="{{ route('register') }}" method="POST">
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
</body>

</html>