{{-- Modal thêm mới todo --}}
<div class="modal fade" id="modal-add">
	@csrf
	<div class="modal-dialog">
		<div class="modal-content">

			<form action=""  id="form-add"  role="form">
				
				<div class="modal-header">
					<h4 class="modal-title">Add san pham</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">tong tien</label>
						<input name="tong_tien" type="text" class="form-control" id="tong_tien" placeholder="Nhập vào so tien">
					</div>

					<div class="form-group">
						<label for="">ghi chu</label>
						<input name="ghi_chu" type="text" class="form-control" id="ghi_chu" placeholder="nhap vao ghi chu">
						
					</div>

					<div class="form-group">
						<label for="">Ngày tao</label>
						<input name="ngay_tao" type="date" name="" id="ngay_tao" class="form-control" value="" required="required" title="">
					</div>

					<div class="form-group">
						<label for="">ten khach hang</label>
						<input name="ten_kh" type="text" class="form-control" id="ten_kh" placeholder="Nhập vào ten kh">
					</div>

					<div class="form-group">
						<label for="">so dien thoai</label>
						<input name="sdt" type="text" class="form-control" id="sdt" placeholder="Nhập vào sdt">
                    </div>
                    <div class="form-group">
						<label for="">dia chi giao hang</label>
						<input name="dia_chi_giao_hang" type="text" class="form-control" id="dia_chi_giao_hang" placeholder="Nhập vào địa chỉ">
					</div>



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btnsend">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
