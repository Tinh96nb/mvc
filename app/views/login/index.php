<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>/css/login.css">
	<title>Login</title>
</head>
<body>
	<section>
      <h2 class="no-span">Login To Cpanel</h2>
      <form method="post" action="<?php echo HTTP_ROOT?>/login/run">
	      	<?php if(Session::get('err')): ?>
		      	<div class="alert alert-warning">
				  <strong>Warning! </strong><?php echo Session::get('err');?></a>.
				</div>
			<?php endif;?>
	      <div class="box">
	        <input type="text" name="name" value="" placeholder="username">
	        <input type="password" name="password" value="" placeholder="password">
	        <input type="submit" value="Login">
	      </div>
      </form>
</section>
</body>
</html>
