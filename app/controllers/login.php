<?php 
/**
* Login Controller
*/
class Login extends Controller
{
	
	public function index()
	{
		Session::start();
		if ( Session::get('loggedIn')) {
			return $this->helper('Redirect')->url(HTTP_ROOT .'/admin');
		}
		$this->view('login/index','',false);
		Session::delete('err');
	}
	public function run()
	{
		$username = htmlentities($_POST['name']);
		$password = md5(htmlentities($_POST['password']));

		if(Admin::where('username',$username)->where('password',$password)->count()){
			//login
			$user = Admin::where('username',$username)->first();
			Session::start();
			Session::set('loggedIn', true);
			Session::set('admin', $user->username);
			return $this->helper('Redirect')->url(HTTP_ROOT .'/admin');

		} else {
			Session::start();
			Session::set('err', 'Please enter a correct username and password');
			$this->helper('Redirect')->url(HTTP_ROOT .'/login');
			Session::delete('err');
		}
	}
}