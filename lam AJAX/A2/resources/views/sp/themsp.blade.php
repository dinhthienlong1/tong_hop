<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" id="form1">
        Ten
        <input type="text" name="" id="txtTen">
        <br />
        Gia
        <input type="text" name="" id="txtGia">
        <br />
        <button type="button" id="btnSend">gui</button>

        <h1 id="msg"></h1>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $("#form1").submit(function(e) {
            e.preventDefault(); // khong cho gui len theo mac dinh cua trinh duyet khi bam vao nut submit
        });
        

        var $btnSend = $("#btnSend");
        var $txtTen = $("#txtTen");
        var $txtGia = $("#txtGia");
        var $msg = $("#msg");
        $btnSend.click(function(e) {
            var _data = {};
            _data._token =  "{{ csrf_token() }}";
            _data.ten_sp = $txtTen.val();
            _data.gia_ban = $txtGia.val();
            console.log(_data);


            //1. tao ra request ajax gui len server + data dinh kem
            var request = $.ajax({
                url: "{{ url('xulythemsp') }}", // route
                method: "POST", // method post/get/put/delete
                data: _data, // cuc data gui len, server se nhan bang $request
                dataType: "json" // muon nhan ve kieu json
            });

            request.done(function(msg) { //200 201 202 // ok
                console.log(msg);
                $msg.html(msg.thong_diep);
            });

            request.fail(function(jqXHR, textStatus) { // >=400, >=500
                alert("Request failed: " + textStatus);
                
            });

        });

    </script>
</body>

</html>
