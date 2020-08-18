<?php 
require_once "../classes/adminlogin.php";
?>

<?php
$classAdmin = new adminLogin();

if(isset($_POST["btnLogin"])){
	$adminUser = $_POST["AdminUser"];
	$adminPass = md5($_POST["AdminPass"]);

	$loginCheck = $classAdmin->admin_login($adminUser, $adminPass);
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span>
			<?php if(isset($loginCheck))
			{
				echo $loginCheck;
			}
			?>
			</span>
			<div>
				<input type="text" placeholder="Username" name="AdminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="AdminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" name="btnLogin"/>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>