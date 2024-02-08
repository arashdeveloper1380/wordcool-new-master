<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ $name }}
    <br><br>

    {{ 
        do_shortcode("[simple_shortcode name='arash' lname='narimani']") 
    }}
    
    {{-- @foreach ($posts as $item)
        <h1>{{ $item->post_title }}</h1>
    @endforeach --}}
</body>
</html>