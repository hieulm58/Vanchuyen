@extends('main')
@section('title')
Lịch sử giao dịch
@endsection


@section('content')
@if(Session::has("order_success"))
       <script>
            window.alert("Đơn đã được chấp nhận");
        </script>
    @endif
<?php
    $orders = App\Order::where('user_id','=',Auth::user()->id)->orWhere('partner_id','=',Auth::user()->id)->get();
    $i = 1;
?>
	<section class="panel panel-success">
    	<div class="panel-heading text-center">
    	   <b>ĐƠN CỦA BẠN</b>
    	</div>

        
    	<div class="panel-body">
            <table id="historytable" class="table table-striped table-bordered">
                
                @if(Auth::check() && Auth::user()->role == 2)
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Loại hàng</th>
                        <th class="text-center">Mức vận chuyển</th>
                        <th class="text-center">Địa điểm đi</th>
                        <th class="text-center">Địa điểm đến</th>
                        <th class="text-center">Khoảng cách (km)</th>
                        <th class="text-center">Tình trạng</th>
                        <th class="text-center">Thời gian</th>
                        <th class="text-center">Giá</th>
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
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thời gian</th>
                            <th class="text-center">Giá</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
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
                    	<td class="text-center">
                    		<?php
                            $comp = $order->partner_id;
                            $takenBy = App\User::where('id','=',$comp)->get()->first();
                    		if ($order->status) echo "<b>Đã được ".$takenBy->realName." nhận</b>";
                    		else echo "Chưa được nhận";
                    		?>
                    	</td>
                    	<td class="text-center">{{$order->created_at}}</td>
                    	<td class="text-center">
                    		<?php
                    		echo $order->distance * $order->type->fee ." đ";
                    		?>
                    	</td>
                    </tr>
        			@endforeach
                    </tbody>
                    @endif

                    @if(Auth::check() && Auth::user()->role == 1)
                    <thead>
                     <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">ĐĐ đi</th>
                        <th class="text-center">ĐĐ đến</th>
                        <th class="text-center">Thời gian</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Họ tên người chuyển</th>
                        <th class="text-center">SĐT liên hệ</th>
                        <th class="text-center">Chi tiết</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">ĐĐ đi</th>
                        <th class="text-center">ĐĐ đến</th>
                        <th class="text-center">Thời gian</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Họ tên người chuyển</th>
                        <th class="text-center">SĐT liên hệ</th>
                        <th class="text-center">Chi tiết</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="text-center"><?php echo $i; $i++;?></td>
                        <td class="text-center">{{$order->sourceAddress}}</td>
                        <td class="text-center">{{$order->destinationAddress}}</td>
                        <td class="text-center">{{$order->created_at}}</td>
                        <td class="text-center">
                            <?php
                            echo $order->distance * $order->type->fee ." đ";
                            ?>
                        </td>
                        <td class="text-center">{{$order->user->realName}}</td>
                        <td class="text-center">{{$order->phone}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              Xem
                            </button>
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
                            Loại hàng: {{$order->type->name}} <br/>
                            Mức vận chuyển: <?php 
                            if($order->level) echo "Nhanh";
                            else echo "Bình thường";
                            ?><br/>
                            Khoảng cách: {{$order->distance}} km.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                          </div>
                        </div>
                      </div>
                    </div>                
                    @endforeach
                    </tbody>
                    @endif
            </table>
        </div>
    </section>
<script>
    $(document).ready(function() {
        $('#historytable').DataTable();
    } );
</script>


@endsection

