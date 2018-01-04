<?php

class contact extends Controller
{
	public function index()
	{
		Session::start();
		return $this->view('contact/index');
		Session::delete('mail');
	}

	public function send()
	{
		if(isset($_POST['submit'])){
		    $to = "phamductinhkma@gmail.com"; // this is your Email address
		    $from = $_POST['email']; // this is the sender's Email address
		    $name = $_POST['name'];
		    $subject = $_POST['name'];
		    $subject2 = "Copy of your form submission";
		    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
		    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

		    $headers = "From:" . $from;
		    $headers2 = "From:" . $to;
		    mail($to,$subject,$message,$headers);
		    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

		    Session::start();
			Session::set('mail', "Mail Sent. Thank you " . $name . ", we will contact you shortly.");
			$this->helper('Redirect')->url(HTTP_ROOT .'/contact');
			Session::delete('mail');
		} else echo "string";
	}
}