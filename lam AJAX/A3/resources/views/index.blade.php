<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">​

</head>

<body>
    <div class="container">
        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">thêm</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>tong tien</th>
                        <th>ghi chu</th>
                        <th>ngay tao</th>
                        <th>ten khach hang</th>
                        <th>so dien thoai</th>
                        <th>dia chi giao hang</th>
                        <th>xoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($san_pham as $sp)
                        @csrf
                        <tr>
                            <td id="{{ $sp->id }}">{{ $sp->id }}</td>
                            <td id="tong_tien-{{ $sp->id }}">{{ $sp->tong_tien }}</td>
                            <td id="ghi_chu-{{ $sp->id }}">{{ $sp->ghi_chu }}</td>
                            <td id="ngay_tao-{{ $sp->id }}">{{ $sp->ngay_tao }}</td>
                            <td id="ten_kh-{{ $sp->id }}">{{ $sp->ten_kh }}</td>
                            <td id="sdt-{{ $sp->id }}">{{ $sp->sdt }}</td>
                            <td id="dia_chi_giao_hang-{{ $sp->id }}">{{ $sp->dia_chi_giao_hang }}</td>
                            <td>
                                <button type="button" class="btn-xoa" data-product-id="{{ $sp->id }}"
                                    data-toggle="modal">Xoa</button>
                                <button type="button" class="btn-sua" data-product-id="{{ $sp->id }}"
                                    data-toggle="modal" data-target="#modal-edit" class="btn-edit">sua</button>
                                <button type="button" data-product-id="{{ $sp->id }}" data-toggle="modal"
                                    data-target="#show" class="btn-show">show</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                @include('add')
                @include('edit')
                @include('show')
            </table>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
                type="text/javascript" charset="utf-8" async defer></script>
            <script type="text/javascript" charset="utf-8">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            </script>
            <script type="text/javascript">
                $('.btn-show').click(function(e) {

                    var id = $(this).data('product-id');


                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/sanpham/show/') }}" + '/' + id,
                        success: function(response) {
                            console.log(response)
                            $('h1#id').text(response.id)
                            $('h1#tong_tien').text(response.tong_tien)
                            $('h1#ghi_chu').text(response.ghi_chu)
                            $('h1#ngay_tao').text(response.ngay_tao)
                            $('h1#ten_kh').text(response.ten_kh)
                            $('h1#sdt').text(response.sdt)
                            $('h1#dia_chi_giao_hang').text(response.dia_chi_giao_hang)
                            // $('h1#created_at').text(response.created_at)
                            // $('h1#update_at').text(response.update_at)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            //xử lý lỗi tại đây
                        }
                    })
                });
                $(".btn-xoa").click(function(e) {

                    var id = $(this).data('product-id');
                    var btn = $(this);
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('sanpham/xoa') }}" + '/' + id,


                        success: function(response) {
                            toastr.success('Delete student success!')
                            btn.closest('tr').remove();
                        }

                    });

                })
                $("#form-add").submit(function(e) {


                    e.preventDefault();
                });

                var $btnSend = $("#btnsend");
                var $Tongtien = $("#tong_tien");
                var $ghichu = $("#ghi_chu");
                var $ngaytao = $("#ngay_tao");
                var $tenkh = $("#ten_kh");
                var $sdt = $("#sdt");
                var $diachi = $("#dia_chi_giao_hang");
                var $msg = $("#msg");
                $btnSend.click(function(e) {
                    var _data = {};
                    _data._token = "{{ csrf_token() }}";
                    _data.tong_tien = $Tongtien.val();
                    _data.ghi_chu = $ghichu.val();
                    _data.ngay_tao = $ngaytao.val();
                    _data.ten_kh = $tenkh.val();
                    _data.sdt = $sdt.val();
                    _data.dia_chi_giao_hang = $diachi.val();
                    console.log(_data);


                    //1. tao ra request ajax gui len server + data dinh kem
                    var request = $.ajax({
                        url: "{{ url('/xulythem') }}", // route
                        method: "post", // method post/get/put/delete
                        data: _data, // cuc data gui len, server se nhan bang $request
                        dataType: "json" // muon nhan ve kieu json

                    });

                    request.done(function(msg) { //200 201 202 // ok
                        console.log(msg);
                        $msg.html(msg.message);
                    });

                    request.fail(function(jqXHR, textStatus, errorThrown) { // >=400, >=500
                        alert("Request failed: " + textStatus);

                    });
                    $('.btn-edit').click(function(e) {

                        var id = $(this).data('product-id');

                        $('#modal-edit').modal('show');

                        e.preventDefault();

                        $.ajax({
                            //phương thức get
                            type: 'get',
                            url: "{{ url('/sanpham/edit') }}" + '/' + id,


                            success: function(response) {
                                //đưa dữ liệu controller gửi về điền vào input trong form edit.
                                $('#tong_tien').val(response.tong_tien);
                                $('#nghi_chu').val(response.nghi_chu);
                                $('#ngay_tao').val(response.ngay_tao);
                                $('#ten_kh').val(response.ten_kh);
                                $('#sdt').val(response.sdt);
                                $('#dia_chi_giao_hang').val(response.dia_chi_giao_hang);
                                $('h1#created_at').text(response.created_at)
                                $('h1#update_at').text(response.update_at)
                                $('#form-edit').attr('data-url','{{ asset('index/') }}/'+response.id)

                                console.log(response);

                            },
                            error: function(error) {

                            }
                        })
                    })


                });

            </script>

</body>

</html>
