<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <html lang="{{ app()->getLocale() }}">
    <title>Document</title>
</head>

<body>
    <li><a href="{{ url('locale/en') }}"><i class="fa fa-language"></i> EN</a></li>

    <li><a href="{{ url('locale/vi') }}"><i class="fa fa-language"></i> VI</a></li>
    <h1>{{ __('messages.welcome') }}</h1>
</body>

</html>
