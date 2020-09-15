<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <div class="container">
            <h1>{{$danhmuc->danhmuc_sp}}</h1>
            </div>
        </div>
        <hr>
        @foreach ($danhmuc->sanphams as $sp)
        <div class="container">
            <div class="thumbnail">
            <img src="{{$sp->hinh_anh}}" alt="">
                <div class="caption">
                    <h3>{{$sp->ten_sp}}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>
