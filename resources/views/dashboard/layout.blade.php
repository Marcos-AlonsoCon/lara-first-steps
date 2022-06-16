{{-- THIS LAYOUT FILE IS THE MASTER LAYOUT FOR ALL THE DASHBOARD VIEWS --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    {{-- WHEN A POST METHOD IS EXECUTED, THIS SHOWS THE CONFIRMATION MESSAGE --}}
    @if (session('status'))
        {{ session('status') }}
    @endif

    @yield('content')

</body>
</html>