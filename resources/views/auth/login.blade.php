@extends('main')

@section('title')
Đăng nhập
@endsection

@section('content')

<form method="post" action="{{url('/auth/login')}}" id="form-login" class="form">
	{!! csrf_field() !!}
	@if(count($errors)>0)
	<div>
	Lỗi rồi:
	<ul>
		@foreach($errors->all() as $error)
		<li> {{$error}}</li>
		@endforeach
	</ul>
	</div>
	@endif
	@if(Session::has("register_success"))
		<div class="alert alert-success">
			<center>{{Session::get("register_success")}}</center>
		</div>
	@endif
	<h2><font> ĐĂNG NHẬP </h2>
	<input type="email" name="email" id="email" placeholder="Email" class="form-control"/>
	<input type="password" name="password" id="password" placeholder="Mật khẩu" class="form-control"/>
	<input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<button type ="submit" class="btn btn-lg btn-warning btn-block"> Đăng nhập </button>
</form>

@endsection