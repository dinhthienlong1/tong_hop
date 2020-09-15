<form action="/xuly_dangky" method="POST">
    @csrf
    <!-- chong goi gia mao hack -->
    <div class="form-group">
        <label for="exampleInputPassword1">name</label>
        <input type="name" class="form-control" id="name" name="name">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">email</label>
        <input type="email" class="form-control" id="email" name="email">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="index">back</a>
