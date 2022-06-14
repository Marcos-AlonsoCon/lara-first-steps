<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- USE ! TO SHOW HTML CODE AS USUAL -->
    {!! $html !!}

    <!-- IF CONDITIONAL -->
    @if ($name == "Marcos")
        Thats true
    @else
        Thats not true
    @endif

    <br>

    <!-- FOREACH AND FORELSE (IN CASE THERE IS NO DATA IN ARRAY RECEIVED) USING DATA FROM index ACTION (CONTROLLER)-->
    @foreach ($array as $a)
        <div class="box item">
            <p>* {{$a}}</p>
        </div>        
    @endforeach
    @forelse ($array as $a)
        <div class="box item">
            <p>- {{$a}}</p>
        </div>     
    
    @empty
            NO DATA
    @endforelse

    <br>
    {{ $name }} <br>
    <!-- THE RIGHT WAY TO COMMENT PHP IN BLADE: -->
    {{-- $age --}}
    {{ $age }}
</body>
</html>