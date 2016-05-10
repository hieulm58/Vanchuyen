<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Auth;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Datatables;

class UserController extends Controller
{
	public function register() {
	    $rules = array(
	    	"email"=>"required|email",
			"password"=>"required|min:6",			
			"realName"=>"required");
		if(!Validator::make(Input::all(), $rules)->fails()) {
			$user = new User();
			$user->email = Input::get("email");
			$user->password = bcrypt(Input::get("password"));
			$user->realName = Input::get("realName");
			$user->role = "2";
			$user->save();
			Session::flash('register_success', 'Chúc mừng '.Input::get('realName').' đã đăng ký thành công! Từ giờ bạn đã có thể đăng nhập với email và password bạn đăng ký.');
			return redirect("/auth/login");
		}
	}

	public function order() {
		$rules = array(
	    	"type"=>"required",
			"level"=>"required",			
			"phone"=>"required",
			"txtSource"=>"required",
			"txtDestination"=>"required",
			"dist"=>"required");
		if(!Validator::make(Input::all(), $rules)->fails()) {
			$order = new Order();
			$order->user_id = Auth::user()->id;
			$order->type_id = Input::get("type");
			$order->level = Input::get("level");
			$order->phone = Input::get("phone");
			$order->sourceAddress = Input::get("txtSource");
			$order->destinationAddress = Input::get("txtDestination");
			$order->distance = Input::get("dist");
			$order->status = 0;
			$order->save();
			Session::flash('order_success', 'Đơn của bạn đã được chúng tôi ghi nhận');
			return redirect('/history');
		}
	}

	public function history() {		
		return view('history');
	}
	/*public function getIndex()
	{
	    return view('history');
	}
	public function anyData()
	{
	    return Datatables::of(Order::where('user_id','=',Auth::user()->id))->make(true);
	}*/
}
