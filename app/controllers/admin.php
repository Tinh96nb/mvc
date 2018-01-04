<?php 

class Admin extends Controller
{
	function __construct()
	{
		Session::start();
		if (!Session::get('loggedIn')) {
			$this->helper('Redirect')->url(HTTP_ROOT .'/login');
		}
	}

	public function index()
	{
		return $this->view('admin/index');
	}

	public function add()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$name = htmlentities($_POST['name']);
			$gender = htmlentities($_POST['gender']);
			$phone = htmlentities($_POST['phone']);
			$email = htmlentities($_POST['email']);
			$age = htmlentities($_POST['age']);
			if( $name && $gender && $phone && $email ){
				$user = new User;
				$user->name = $name;
                $user->gender = $gender;
                $user->phone = $phone;
                $user->email = $email;
                $user->age = $age;
                $user->save();
                echo 'ok';
			} else echo 'Required fieds';
		}
	}

	public function listuser()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$col =array(
			    0   =>  'id',
			    1   =>  'name',
			    2   =>  'email',
			    3   =>  'gender',
			    4   =>  'phone',
			    5   =>  'age',
			    6   =>  'active'
			); 
			$users = array();
			$totaldata = User::where('active', '1')->count();
			$totalfiltered = $totaldata;
			foreach (User::orderBy($col[$_REQUEST['order'][0]['column']],$_REQUEST['order'][0]['dir'])->cursor() as $user) {
				$sub_user = array();
			    $sub_user[] = $user->id;
			    $sub_user[] = $user->name;
			    $sub_user[] = $user->email;
			    $sub_user[] = $user->gender;
			    $sub_user[] = $user->phone;
			    $sub_user[] = $user->age;
			    if($user->active==1){
			    	$sub_user[] = '<div class="text-center status"><a href="'.HTTP_ROOT.'/admin/active/'.$user->id.'/0"><button type="button" class="btn btn-info btn-sm">
                		<i class="fa fa-eye" aria-hidden="true"></i> Changer 
                	</button></a>';
			    } else {
			    	$sub_user[] = '<div class="text-center status"><a href="'.HTTP_ROOT.'/admin/active/'.$user->id.'/1"<button type="button" class="btn btn-warning btn-sm">
                		<i class="fa fa-eye-slash" aria-hidden="true"></i> Changer 
                	</button>';
			    }
			    $sub_user[] = '<div class="text-center"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#show-update">
                		<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit 
                	</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#show-delete">
                    	<i class="fa fa-trash" aria-hidden="true"></i> Delete
                    </button></div>';
			    $users[] = $sub_user;
			}
			$jsondata = array(
				"draw"            => intval( $_REQUEST['draw'] ),
	            "recordsTotal"    => intval( $totaldata ),
	            "recordsFiltered" => intval( $totalfiltered ),
	            "data"            => $users
			);
			echo json_encode($jsondata);
		} else $this->helper('Redirect')->url(HTTP_ROOT .'/login');
	}

	public function update()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id = htmlentities($_POST['id']);
			$name = htmlentities($_POST['name']);
			$gender = htmlentities($_POST['gender']);
			$phone = htmlentities($_POST['phone']);
			$email = htmlentities($_POST['email']);
			$age = htmlentities($_POST['age']);
			$user = User::find($id);
    		if( $user ) {
    			if( $name && $gender && $phone && $email ){
    				$user->name = $name;
                    $user->gender = $gender;
                    $user->phone = $phone;
                    $user->email = $email;
                    $user->age = $age;
                    $user->save();
                    echo 'ok';
    			} else echo 'Required fieds';
    		} else echo 'Errors';
		}
	}

	public function delete()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id = htmlentities($_POST['id']);
			$user = User::find($id);
    		if( $user ) {
    			if($user->delete()){
    				echo "ok";
    			} else echo "Errors";
    		} else echo 'No find user';
		}
	}

	public function active($id,$value)
	{
		$id = str_replace('/[^0-9]/','', $id);
		if ($value != '0' && $value != '1') {
			return $this->helper('Redirect')->url(HTTP_ROOT .'/admin');
		}
		if($user = User::find($id)){
			$user->active = $value;
			$user->save();
		}
		return $this->helper('Redirect')->url(HTTP_ROOT .'/admin');
	}

	public function logout()
	{
		Session::delete('loggedIn');
		Session::delete('username');
		return $this->helper('Redirect')->url(HTTP_ROOT);
	}
}