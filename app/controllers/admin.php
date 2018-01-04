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
		return $this->view('admin/index',true);
	}

	public function add()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$name = htmlentities($_POST['name']);
			$gender = htmlentities($_POST['gender']);
			$phone = htmlentities($_POST['phone']);
			$email = htmlentities($_POST['email']);
			if( $name && $gender && $phone && $email ){
				$user = new User;
				$user->name = $name;
                $user->gender = $gender;
                $user->phone = $phone;
                $user->email = $email;
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
			    5   =>  'avatar',
			    6   =>  'active'
			); 
			$users = array();
			$totaldata = User::where('active', '1')->count();
			$totalfiltered = $totaldata;
			foreach (User::where('active', '1')->orderBy($col[$_REQUEST['order'][0]['column']],$_REQUEST['order'][0]['dir'])->cursor() as $user) {
				$sub_user = array();
			    $sub_user[] = $user->id;
			    $sub_user[] = $user->name;
			    $sub_user[] = $user->email;
			    $sub_user[] = $user->gender;
			    $sub_user[] = $user->phone;
			    $sub_user[] = $user->avatar;
			    $sub_user[] = $user->active;
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
			$user = User::find($id);
    		if( $user ) {
    			if( $name && $gender && $phone && $email ){
    				$user->name = $name;
                    $user->gender = $gender;
                    $user->phone = $phone;
                    $user->email = $email;
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
	public function logout()
	{
		Session::delete('loggedIn');
		return $this->helper('Redirect')->url(HTTP_ROOT .'/login');
	}
}