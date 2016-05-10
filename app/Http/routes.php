<?php

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/', function () {
	return view('welcome');
});
Route::get('/register', function() {
	return view('register');
});
Route::post('/register', 'UserController@register');
Route::get('/login', function() {
	return view('/auth/login');
});

Route::group(['middleware' => 'auth'], function() {

	Route::get('/orders', function() {
		return view('orders');
	});
	Route::post('/orders', 'UserController@order');
	Route::get('/history', 'UserController@history');
});
Route::get('/partner', 'PartnerController@partner');
Route::get('/partner/{order_id}',function($order_id) {
	$order = App\Order::where('id','=',$order_id)->get()->first();
	$order->partner_id = Auth::user()->id;
    $order->status = 1;
    $order->save();
    Session::flash('accept_success', 'Bạn vừa nhận thành công 1 đơn. Hãy vào Lịch sử giao dịch để xem chi tiết đơn bạn vừa nhận');
    return redirect("/partner");
});
Route::get('/admin',function(){
	if (!Auth::user())
        return Redirect('login');
    if (Auth::user()->role != '0')
        return view('restricted');
    else return view('admin');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('show-order', function ()    {
        if (!Auth::user())
        return Redirect('login');
    if (Auth::user()->role != '0')
        return view('restricted');
    else return view('show-order');
    });
    Route::get('show-member', function ()    {
        if (!Auth::user())
        return Redirect('login');
    if (Auth::user()->role != '0')
        return view('restricted');
    else return view('show-member');
    });
    Route::get('add-member', function ()    {
        if (!Auth::user())
        return Redirect('login');
    if (Auth::user()->role != '0')
        return view('restricted');
    else return view('add-member');
    });
    Route::post('add-member', function(){
    	$rules = array(
	    	"email"=>"required|email",
			"password"=>"required|min:6",			
			"realName"=>"required",
			"role"=>"required");
		if(!Validator::make(Input::all(), $rules)->fails()) {
			$user = new User();
			$user->email = Input::get("email");
			$user->password = bcrypt(Input::get("password"));
			$user->realName = Input::get("realName");
			$user->role = Input::get("role");
			$user->save();
			Session::flash('add_success', 'Đã thêm thành công');
			return view("add-member");
		}
    });
});

/*Route::controller('history', 'UserController', [
    'anyData'  => 'history.data',
    'getIndex' => 'history',
]);*/