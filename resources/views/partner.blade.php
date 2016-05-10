@extends('main')

@section('title')
Partner Portal
@endsection

@section('content')
@if(Session::has("accept_success"))
		<div class="alert alert-success">
			<center>{{Session::get("accept_success")}}</center>
		</div>
	@endif
<?php
    $orders = App\Order::where('status','=','0')->get();
    $i = 1;
?>
<section class="panel panel-primary">
	<div class="panel-heading text-center">
	<b>CÁC ĐƠN ĐANG CHỜ</b>
	</div>
	<div class="panel-body">
    <table id="ordertable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Loại hàng</th>
                <th class="text-center">Mức vận chuyển</th>
                <th class="text-center">Địa điểm đi</th>
                <th class="text-center">Địa điểm đến</th>
                <th class="text-center">Khoảng cách (km)</th>
                <th class="text-center">Thời gian đặt</th>
                <th class="text-center">Giá</th>
                <th class="text-center">Tùy chọn</th>
            </tr>
        </thead>
        <tfoot>
        	<tr>
                <th class="text-center">STT</th>
                <th class="text-center">Loại hàng</th>
                <th class="text-center">Mức vận chuyển</th>
                <th class="text-center">Địa điểm đi</th>
                <th class="text-center">Địa điểm đến</th>
                <th class="text-center">Khoảng cách (km)</th>
                <th class="text-center">Thời gian đặt</th>
                <th class="text-center">Giá</th>
                <th class="text-center">Tùy chọn</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($orders as $order)
            <tr id="order{{$order->id}}">
            	<td class="text-center"><?php echo $i; $i++;?></td>
            	<td class="text-center">{{$order->type->name}}</td>
            	<td class="text-center">
	            	<?php 
	            	if($order->level) echo "Nhanh";
	            	else echo "Bình thường";
	            	?>
	            </td>
            	<td class="text-center">{{$order->sourceAddress}}</td>
            	<td class="text-center">{{$order->destinationAddress}}</td>
            	<td class="text-center">{{$order->distance}}</td>
            	<td class="text-center">{{$order->created_at}}</td>
            	<td class="text-center">
            		<?php
            		echo $order->distance * $order->type->fee ." đ";
            		?>
            	</td>            	
            	<td class="text-center">
            		<?php echo'<a href="';?>{{Asset('/partner')}}<?php echo '/'.$order->id.'">';?>
            		<button type="button" class="btn btn-primary" >
					  Nhận
					</button>
					<?php
					echo "</a>";
					?>

				</td>
            </tr>
			@endforeach
			</tbody>
        
    </table>
	<script>
	    $(document).ready(function() {
	    $('#ordertable').DataTable();
		} );
	</script>
    </div>

   
    </section>

@endsection