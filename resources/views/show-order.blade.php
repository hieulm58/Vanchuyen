@extends('admin-layout')
@section('content')
<div class="row">
    <div class="col-md-12">
	    <h1 class="page-head-line">DANH SÁCH ĐƠN</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php
		    $orders = App\Order::get();
		    $i = 1;
		?>
		<table id="ordertable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Người đặt</th>
                <th class="text-center">Công ty nhận</th>
                <th class="text-center">Thời gian đặt</th>
                <th class="text-center">Giá</th>
                <th class="text-center">Chi tiết</th>
            </tr>
        </thead>
        <tfoot>
        	<tr>
                <th class="text-center">STT</th>
                <th class="text-center">Người đặt</th>
                <th class="text-center">Công ty nhận</th>
                <th class="text-center">Thời gian đặt</th>
                <th class="text-center">Giá</th>
                <th class="text-center">Chi tiết</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($orders as $order)
            <tr id="order{{$order->id}}">
            	<td class="text-center"><?php echo $i; $i++;?></td>
            	<td class="text-center">
            		<?php
	            		$userId = $order->user_id;
	            		$user = App\User::where('id','=',$userId)->get()->first();
	            		echo $user->realName;
	            	?>
            	</td>
            	<td class="text-center">
	            	<?php
	            	if ($order->partner_id != 0){
	            		$partnerId = $order->partner_id;
	            		$partner = App\User::where('id','=',$partnerId)->get()->first();
	            		echo "Đã nhận bởi <b>".$partner->realName."</b>";
	            	}
	            	else echo "Chưa được nhận";
	            	?>
	            </td>
            	<td class="text-center">{{$order->created_at}}</td>
            	<td class="text-center">
            		<?php
            		echo $order->distance * $order->type->fee ." đ";
            		?>
            	</td>            	
            	<td class="text-center">
            		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Xem thêm</button>
				</td>
            </tr>
            <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Chi tiết</h4>
                          </div>
                          <div class="modal-body">
                          	<b>SĐT người đặt:</b> {{$order->phone}}<br/>
                            <b>Loại hàng:</b> {{$order->type->name}} <br/>
                            <b>Mức vận chuyển:</b> <?php 
                            if($order->level) echo "Nhanh";
                            else echo "Bình thường";
                            ?><br/>
                            <b>Địa điểm đi:</b> {{$order->sourceAddress}}<br/>
                            <b>Địa điểm đến:</b> {{$order->destinationAddress}}<br/>
                            <b>Khoảng cách:</b> {{$order->distance}} km.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                          </div>
                        </div>
                      </div>
                    </div>                
			@endforeach
			</tbody>        
    </table>
    <script>
	    $(document).ready(function() {
	    	$('#ordertable').DataTable();
		} );
	</script>
	</div>
</div>
@endsection