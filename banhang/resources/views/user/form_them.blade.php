{{-- khai bao template can sai --}}
@extends('template.main')


@section('content')
<h1>them user moi</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/XuLyThemUser" method="POST">
    @csrf <!-- chong goi gia mao hack -->
    <div class="form-group">
        <label for="exampleInputEmail1">email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <a href="sanpham">back</a>
@endsection

