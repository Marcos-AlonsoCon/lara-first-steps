<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOM</title>
</head>
<body>
    <!-- TAKES PARAM msg FROM WEB ROUTE /custom -->
    <!-- THERE ARE THREE WAYS OF USING PHP: -->
        <!-- 1 -->
    <?php echo $msg ?> <hr>
        <!-- 2 -->
    <?= $msg ?> <hr>

        <!-- 3. METHOD ALLOWD BY LARAVEL -->
    <h1>{{ $msg }}  ---   {{ $anothermsg }}</h1> <br>

</body>
</html>