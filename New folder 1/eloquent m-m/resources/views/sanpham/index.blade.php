<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <table class="table table-dark">
        <thead class="thead-dark">
            <tr >
                <td>id</td>
                <td>ten san pham</td>
                <td>danh muc</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanpham as $sp)
                <tr>
                    <th>{{ $sp->id }}</th>
                    <th>{{ $sp->ten_sp }}</th>
                    <th>{{ $sp->cat->danhmuc_sp}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="panel-footer">
        {{$sanpham->links()}}
    </div>
</body>

</html>
