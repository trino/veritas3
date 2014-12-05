
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		Veritas | Intelligence on Demand
	</title>
    
	<link href="<?php echo WEB_ROOT;?>favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?php echo WEB_ROOT;?>favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>css/style.css" />
    <script type="text/javascript" src="<?php echo WEB_ROOT;?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo WEB_ROOT;?>js/ajaxupload.3.6.js">
    </script><script type="text/javascript" src="<?php echo WEB_ROOT;?>js/jquery.validate.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
    
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<link rel="shortcut icon" href="<?php echo WEB_ROOT;?>img/favicon.ico" />
	
    <style>
	body {
		background-image:url("<?php echo WEB_ROOT;?>img/bk_dots.gif");
		background-repeat: repeat;
	}
	#fullContainer{
		min-width:600px;
	}
	</style>
	
    <script type="text/javascript">
    $(document).ready(function(){
     $('#Form').validate({
    rules: {
            password: 'required',
            c_password: {
                  required: true,
                  equalTo: '#password'
            }
      }
 });  
     });
    
    </script>
    <style>label.error{display: none !important;}

.required.error{border:1px solid red !important;}

</style>
    
</head>
<body>



<div id="fullContainer">

				

				
				<div class="mainContent">
				
<center><br><br>
<img src="<?php echo WEB_ROOT;?>/img/loginLogo.png" />
</center>
<div class="login" style="margin-bottom:30px;margin-top:30px;">

<h2>Login</h2>
<form action="" method="post" id="loginform">
<label>Username</label><input type="text" name="username" />
<label>Password</label><input type="password" name="password" />
<!--<label>Login As</label>
<select class="loginas">
<option value="home">User</option>
<option value="admin">Admin</option>
</select> -->
<div class="log-submit">

<style>
#flashMessage,.message{
width:100%;
margin:0px;
border:0px; padding:0px; background-color:#ffffff;
text-align:center; color:#ff0000; font-style:italic;  padding-bottom:10px; font-size:12px;
}
</style>


<input type="submit" name="submit" value="Login" class="btn btn-primary" />



<div class="clear"></div>
</form>



</div>


<script>


$(function(){
   $('.loginas').change(function(){
    $('#loginform').attr('action','<?php echo WEB_ROOT;?>'+$(this).val());
   }); 
});

</script>

</div>

<center>
<a href="mailto:info@afimacglobal.com?subject=Veritas&body=Hello,%0A%0APlease%20contact%20me%20with%20information%20regarding%20Veritas.%0A%0AName%20(first,%20last):%0A%0APhone:%20(%20%20%20%20%20%20)%0A%0AThank%20you,"><img src="<?php echo WEB_ROOT;?>/img/yespleasecontactme.jpg" />
</a>
</center>				</div>
				
				
</div><!-- fullContainer -->


</body>
</html>

