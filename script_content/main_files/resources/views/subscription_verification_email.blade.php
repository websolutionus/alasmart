<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    {!! clean($template) !!}
    <a href="{{ route('subscriber-verification',$subscriber->verified_token) }}">{{ $subscriber->verified_token }}</a>
</body>
</html>
