<?php
/**
* 
*/
class home extends Controller
{
	public function index()
	{
		$user = User::all();
		return $this->view('home/index',$user);
	}

	public function error()
	{
		return $this->view('404');
	}

	public function get($id)
	{
		$user = User::where('id', $id)->first();
		return $this->view('home/getuser',[ 'user' => $user ]);
	}
}