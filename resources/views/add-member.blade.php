@extends('admin-layout')
@section('content')
<div class="row">
    <div class="col-md-12">
	    <h1 class="page-head-line">THÊM TÀI KHOẢN MỚI</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
	@if(Session::has("add_success"))
		<div class="alert alert-success">
			<center>{{Session::get("add_success")}}</center>
		</div>
	@endif
		<div class="panel panel-danger">
			<div class="panel-heading">
                Thêm tài khoản
            </div>
            <div class="panel-body">
            	<form role="form" method="post" action="{{Asset('admin/add-member')}}" id="form-add-member">
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input class="form-control" type="text" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                        </div>
                    <div class="form-group">
                        <label>Re Type Password </label>
                        <input class="form-control" type="password" id="re-password" name="re-password">
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" type="text" id="realName" name="realName">
                    </div>
                    <div class="form-group">
                    	<label>Chọn quyền hạn</label>
                    	<select class="form-control" name="role">
	                    	<option value="0">Admin</option>
	            			<option value="1">Partner</option>
	            			<option value="2">Thành viên</option>
                    	</select>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">              
                    <button type="submit" class="btn btn-danger">Thêm</button>

                </form>
            </div>
        </div>
	</div>
	<div class="col-md-2">
	</div>
</div>
@endsection