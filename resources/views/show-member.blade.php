@extends('admin-layout')
@section('content')
<div class="row">
    <div class="col-md-12">
	    <h1 class="page-head-line">DANH SÁCH THÀnH VIÊN</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php
		    $users = App\User::get();
		    $i = 1;
		?>
		<table id="usertable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tên</th>
                <th class="text-center">Quyền hạn</th>
                <th class="text-center">Tùy chọn</th>
            </tr>
        </thead>
        <tfoot>
        	<tr>
                <th class="text-center">STT</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tên</th>
                <th class="text-center">Quyền hạn</th>
                <th class="text-center">Tùy chọn</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($users as $user)
            <tr id="user{{$user->id}}">
            	<td class="text-center"><?php echo $i; $i++;?></td>
            	<td class="text-center">{{$user->email}}</td>
            	<td class="text-center">{{$user->realName}}</td>
            	<td class="text-center">
            		<?php
            			if($user->role == 0) echo "Admin";
            			if($user->role == 1) echo "Partner";
            			if($user->role == 2) echo "Thành viên";
            		?>
            	</td>
            	<td class="text-center"></td>
            </tr>
			@endforeach
			</tbody>        
    </table>
    <script>
	    $(document).ready(function() {
	    	$('#usertable').DataTable();
		} );
	</script>
	</div>
</div>
@endsection
