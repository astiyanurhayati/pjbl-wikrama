<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>    
    <link rel="stylesheet" href="{{ asset('assets/app.e4a36eae.css') }}">
<style>
    .login__left{
        background-image: url('{{ asset('assets/img/login.png') }}');
        background-position: left;
        color: white;
    }
    .login__left__img{
        position: absolute;
        width: 60px;
        top: -10%;
        left: 43%;
    }
</style>
</head>

<body>
    {{ $slot }}
</body>

</html>
