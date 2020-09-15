
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/0.7.8/themes/black/pace-theme-barber-shop.min.css">
	<style>
		.pace {
  -webkit-pointer-events: none;
  pointer-events: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.pace-inactive {
  display: none;
}

.pace .pace-progress {
  background: #29d;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 2px;
}

.pace .pace-progress-inner {
  display: block;
  position: absolute;
  right: 0px;
  width: 100px;
  height: 100%;
  box-shadow: 0 0 10px #29d, 0 0 5px #29d;
  opacity: 1.0;
  -webkit-transform: rotate(3deg) translate(0px, -4px);
  -moz-transform: rotate(3deg) translate(0px, -4px);
  -ms-transform: rotate(3deg) translate(0px, -4px);
  -o-transform: rotate(3deg) translate(0px, -4px);
  transform: rotate(3deg) translate(0px, -4px);
}

.pace .pace-activity {
  display: block;
  position: fixed;
  z-index: 2000;
  top: 15px;
  right: 15px;
  width: 14px;
  height: 14px;
  border: solid 2px transparent;
  border-top-color: #29d;
  border-left-color: #29d;
  border-radius: 10px;
  -webkit-animation: pace-spinner 400ms linear infinite;
  -moz-animation: pace-spinner 400ms linear infinite;
  -ms-animation: pace-spinner 400ms linear infinite;
  -o-animation: pace-spinner 400ms linear infinite;
  animation: pace-spinner 400ms linear infinite;
}

@-webkit-keyframes pace-spinner {
  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}
@-moz-keyframes pace-spinner {
  0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
}
@-o-keyframes pace-spinner {
  0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
}
@-ms-keyframes pace-spinner {
  0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
}
@keyframes pace-spinner {
  0% { transform: rotate(0deg); transform: rotate(0deg); }
  100% { transform: rotate(360deg); transform: rotate(360deg); }
}

	</style>
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
						<th>Họ tên</th>
						<th>Giới tính</th>
						<th>Ngày sinh</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{{-- biến $todos được controller trả cho view
						chứa dữ liệu tất cả các bản ghi trong bảng students. Dùng foreach để hiển
						thị từng bản ghi ra table này. --}}

						@foreach ($students as $hs)
						<tr>
							<td id="{{$hs->id}}">{{$hs->id}}</td>
							<td id="hoten-{{$hs->id}}">{{$hs->hoten}}</td>
							<td id="gioitinh-{{$hs->id}}">{{$hs->gioitinh}}</td>
							<td id="ngaysinh-{{$hs->id}}">{{$hs->ngaysinh}}</td>
							<td id="sdt-{{$hs->id}}">{{$hs->sdt}}</td>
							<td id="diachi-{{$hs->id}}">{{$hs->diachi}}</td>
							<td>
								<button data-url="{{ route('index.show',$hs->id) }}"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">chi tiết học sinh</button>
								<button data-url="{{ route('index.update',$hs->id) }}"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">sữa</button>
								<button data-url="{{ route('index.destroy',$hs->id) }}"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">xóa</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
            {{$students->links()}}
           
            
		</div>

		@include('student.add')
		@include('student.detail')
		@include('student.edit')

		<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
		></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/0.7.8/pace.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
		<script type="text/javascript" charset="utf-8">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
		<script type="text/javascript">
		 	var data_laravel = {!! json_encode($data_laravel) !!};
		 	var data_laravel2 = {!! json_encode($data_laravel2) !!};
			 
			$(document).ajaxStart(function() { Pace.restart(); });
			$(document).ready(function () {
				

				$('#form-add').submit(function(e){

					e.preventDefault(); // ngan chan submit cua browser mac dinh

					var url = $(this).attr('data-url');

					$.ajax({
						type: 'post',
						url: url,
						async:false,
						data: {
							hoten: $('#hoten-add').val(),
							gioitinh: $('#gioitinh-add').val(),
							ngaysinh: $('#ngaysinh-add').val(),
							sdt: $('#sdt-add').val(),
							diachi: $('#diachi-add').val(),
						},
						beforeSend: function(jqXHR, settings ){
							console.log('hihi');
						},
					})
					.done(function(response) { //done
						//toastr.success(response.message)
						$('#modal-add').modal('hide');
						setTimeout(function(){
							//window.location.href="{{route('index.index')}}";
						},500)
					})
					.fail(function (jqXHR, textStatus, errorThrown) { //fail
						//xử lý lỗi tại đây
					})
					.always(function (data) { //aways
						console.log('ok');
					});
				})

				$('.btn-show').click(function(){
					var url = $(this).attr('data-url');
					$.ajax({
						type: 'get',
						url: url,
						success: function(response) {
							console.log(response)

							$('#id').text(response.id)
							$('#hoten').text(response.hoten)
							$('#gioitinh').text(response.gioitinh)
							$('h1#ngaysinh').text(response.ngaysinh)
							$('h1#sdt').text(response.sdt)
							$('h1#diachi').text(response.diachi)
							// $('h1#created_at').text(response.created_at)
							// $('h1#update_at').text(response.update_at)
						},
						error: function (jqXHR, textStatus, errorThrown) {
							//xử lý lỗi tại đây
						}
					})
				})
				_token: $('meta[name="_token"]').attr('content');

				$('.btn-delete').click(function(){
					var url = $(this).attr('data-url');
					var _this = $(this);
					if (confirm('May co chac muon xoa khong?')) {
						$.ajax({
							type: 'delete',
							url: url,
							success: function(response) {
								toastr.success('Delete student success!')
								_this.parent().parent().remove();
							},
							error: function (jqXHR, textStatus, errorThrown) {
								//xử lý lỗi tại đây
							}
						})
					}
				})

				$('.btn-edit').click(function(e){

					var url = $(this).attr('data-url');

					$('#modal-edit').modal('show');

					e.preventDefault();

					$.ajax({
							//phương thức get
							type: 'get',
							url: url,
							success: function (response) {
								//đưa dữ liệu controller gửi về điền vào input trong form edit.
								$('#hoten-edit').val(response.hoten);
								$('#ngaysinh-edit').val(response.ngaysinh);
								$('#gioitinh-edit').val(response.gioitinh);
								$('#sdt-edit').val(response.sdt);
								$('#diachi-edit').val(response.diachi);
								//thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
								$('#form-edit').attr('data-url','{{ asset('index/') }}/'+response.id)
								console.log(response)
							},
							error: function (error) {
								
							}
						})
				})

				$('#form-edit').submit(function(e){
					e.preventDefault();
					var url=$(this).attr('data-url');

					$.ajax({
						type: 'put',
						url: url,
						data: {
							hoten: $('#hoten-edit').val(),
							gioitinh: $('#gioitinh-edit').val(),
							ngaysinh: $('#ngaysinh-edit').val(),
							sdt: $('#sdt-edit').val(),
							diachi: $('#diachi-edit').val(),
						},
						success: function(response) {
							// console.log(response.studentid)
							toastr.success(response.message)
							$('#modal-edit').modal('hide');
							$('#hoten-'+response.studentid).text(response.student.hoten)
							$('#gioitinh-'+response.studentid).text(response.student.gioitinh)
							$('#ngaysinh-'+response.studentid).text(response.student.ngaysinh)
							$('#sdt-'+response.studentid).text(response.student.sdt)
							$('#diachi-'+response.studentid).text(response.student.diachi)
						},
						error: function (jqXHR, textStatus, errorThrown) {
							//xử lý lỗi tại đây
						}
					})
				})
			})
		</script>
	</body>
	</html>​