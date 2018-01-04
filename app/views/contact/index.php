<link rel="stylesheet" type="text/css" href="css/contact.css">
<div class="main">
  	<div class="hipsum">
	    <div class="jumbotron">
	    	<div class="box-title">
	    		<h2>Contact me</h2>
	    	</div>
	    	<div class="contact-box fadeInDownBig">
  <div class="contact-box-header group">
    <?php echo Session::get('mail'); ?>
    <h2>Contact</h2>
    <h3>Tell me what <em>you</em> think...</h3>
   </div>
  <form id="contact-form" action="<?php echo HTTP_ROOT;?>/contact/send" method="post">
    <div class="group">
      <div class="col2">
        <label class="form-icon"></label>
        <input type="text" placeholder="Name" name="name" id="name" required>
      </div>
      <div class="col2">
        <label class="form-icon"></label>
        <input type="email" placeholder="Email" name="email" id="email" required>
      </div>
    </div>
    <div class="group">
      <div class="col1 last">
        <label class="form-icon"></label>
        <textarea placeholder="Message" required name="message" id="message"></textarea>
      </div>
    </div>
    <div class="contact-box-footer group">
      <input type="submit" value="Send" name="submit">
    </div>
  </form>
</div>

<footer>
  <ul class="social">
    <li>
      <a href="http://github.com/Tinh96nb" class="social-icon"><i class="fa fa-github fa-2x" ></i></a>
    </li>
    <li>
      <a href="http://fb.com/phamtinh.it" class="social-icon"><i class="fa fa-facebook-official fa-2x"></i></a>
    </li>
  </ul>
</footer>
	    </div>
	</div>
</div>
