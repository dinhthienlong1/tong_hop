@extends('template.banhang')

@section('content')
   <h1>thank you!</h1>
   <h2>thong tin kh</h2>
   <table class="table table-striped table-bordered">
       <tr>
           <th>ho va ten </th>
            <td>{{$donhang['ten_kh']}}</td>
       </tr>
       <tr>
           <th>tong tien </th>
            <td>{{$donhang['tong_tien']}}</td>
       </tr>
       <tr>
           <th>sdt </th>
            <td>{{$donhang['sdt']}}</td>
       </tr>
       <tr>
           <th>dia chi giao hang</th>
            <td>{{$donhang['dia_chi_giao_hang']}}</td>
       </tr>
   </table>
   <h2>chi tiet don hang</h2>
   <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ten sp</th>
                <th>gia</th>
                <th>so luong</th>
                <th>thanh tien</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang['ct_donhang'] as $sp)
                <tr>
                    <td>{{$sp->ten_sp}}</td>
                    <td>{{$sp->gia}}</td>
                    <td>{{$sp->sl}}</td>
                    <td>{{$sp->thanh_tien}}</td>
                    
                </tr>
            @endforeach
           
        </tbody>
   </table>
@endsection
