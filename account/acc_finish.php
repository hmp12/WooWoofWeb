<!DOCTYPE HTML>
<html>  
	<head>
		<?php include '../html/head.html';?>
	</head>
	<body>
		<?php include '../html/nar_bar.html';?>
		<div class="acc_finish">
			<div class="noti_box">
				<?php
					if ($_SERVER["REQUEST_METHOD"] != "POST") {
						header('location: login_out.php');
					}
					if ($_POST["action"] == "signup") {
						echo "Your account ".$_POST["usr"]." has been registered successfully";	
						$link = "login_out.php";
						$title = "Go to login page";
					}
					if ($_POST["action"] == "login") {
						echo "Your account ".$_POST["usr"]." has been logged in successfully";	
						$link = "../index.php";
						$title = "Return home page";
					}
					if ($_POST["action"] == "logout") {
						echo "Your account has been logged out successfully";	
						$link = "../index.php";
						$title = "Return home page";
					}
				?>
				<a href="<?php echo $link;?>"><br/><?php echo $title;?></a>
			</div>
		</div>
	</body>
</html>