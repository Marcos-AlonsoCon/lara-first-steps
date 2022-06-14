<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME</h1>

    <a href="/contactme">Contact</a> <br>
    <a href="{{ route('contact') }} ">Contact (route with name)</a>
    
    <br>
    <br>
    <h4>OBJECT FROM DATABASE:</h4>
    <!-- OBJECT RECEIVED FROM TestController -->
    {{ $user -> name }}: {{ $user -> email }}
</body>
</html>