<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{date('y')}}
    <br/>
    {{3+7}}
    <br/>
    {!!"<h3>Hello</h3>"!!} 
    <?=  "<h3> HEllo </h3>" ?>
    <h2>
        Hello @{{name}}
    </h2>

    @php
    $message ="Hello world";
    @endphp

    <h2>{{$message}}</h2>

    {{--this is a comment --}}
</body>
</html>