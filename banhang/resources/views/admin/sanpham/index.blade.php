{{-- khai bao template can sai --}}
@extends('template.main')


@section('content')
    <h1>TRANG SAN PHAM</h1>
 
    <h2>tong tien: {{$tong_tien}}</h2>

    <table class="table table-bordered" style="background-color:white;">
        <thead>
            <tr>
                <th>id</th>
                <th>username</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->username}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   <a href="them_user">them moi</a>
    {{$users->links()}}
@endsection

