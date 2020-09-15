<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>ĐĂNG NHẬP</h2>
        <div class="login-help">
            <a href="/{{ ('dangky') }}" >Đăng ký</a> - <a href="#" >Quên mật khẩu</a>
        </div>

        <form action="{{ url('/index') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="uname">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="email" value="{{old('email')}}" name="email" required>

                @if ($errors->has('email'))
                    <p style="color: red">{{ $errors->first('email') }}</p>
                @endif

            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="password" name="password" required>

                @if ($errors->has('password'))
                    <p style="color: red">{{ $errors->first('password') }}</p>
                @endif

            </div>

            <button type="submit" class="btn btn-primary">ĐĂNG NHẬP</button>
        </form>
    </div>
</body>

</html>
