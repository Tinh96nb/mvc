<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>/css/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>/css/dataTables.responsive.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> Admin Cpanel</title>
</head>
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Close</span>
  </a>
  <div class="logo">
    MVC PHP PROJECT
  </div>
</div>
<div class="sidebar">
  <ul>
    <li><a href="<?php echo HTTP_ROOT ?>"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><a href="<?php echo HTTP_ROOT ?>/contact"><i class="fa fa-address-book"></i><span>About</span></a></li>
    
    <?php if(!Session::get('loggedIn')):?>
      <li><a href="<?php echo HTTP_ROOT;?>/login"><i class="fa fa-sign-in"></i><span>Login To Cpanel</span></a></li>
    <?php else:?>
      <li><a href="<?php echo HTTP_ROOT ?>/admin/logout"><i class="fa fa-sign-out"></i><span>Sign Out</span></a></li>
    <?php endif;?>
</div>