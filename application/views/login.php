<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
    <link href="<?php echo base_url(CSS); ?>/login.css" rel="stylesheet" />
    <link href="<?php echo base_url(VENDOR); ?>/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(VENDOR); ?>/fontawesome-free/css/fontawesome.min.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
	<img src="image/login.png"/>
		<form method='POST' action='#'>
			<div class="form-input">
				<input type="text" name="text" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>