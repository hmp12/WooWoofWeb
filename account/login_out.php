<?php
	include '../php/session.php';
	$session = new Session();
	$session->start();
	if ($session->get() != '') $logged_in = True;
	else $logged_in = False;
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
		<?php
			include '../html/head.html';
		?>
	</head>

	<?php
		include '../php/database.php';
		$db = new Database();
		$db->connect();
		$valid = False;
		$usr = $pass = "";
		$err = "Enter your username and password";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["usr"])) {
				$err = "Please enter your username";
			}
			else {
				$usr = $_POST["usr"];
				if (empty($_POST["pass"])) {
					$err = "Please enter your password";
				}
				else {
					$pass = $_POST["pass"];
					$sql = "SELECT usr, pass FROM user";
					$data = $db->query($sql);
					if ($data->num_rows > 0) {
						$err = "Invalid username";
						while ($row = $data->fetch_assoc()) {
							echo $row['usr'];
							if ($usr == $row['usr']) {
								if ($pass == $row['pass']) {
									$session->send($usr);
									$valid = True;
									$err = "";
								}
								else {
									$err = "Wrong password";
								}	
							break;
							}
						}
					}
				}
			}
		}
		if ($logged_in) {
			$session->destroy();
		}
		$db->close();
	?>	

	<body>
		<?php include '../html/nar_bar.html';?>
		<div class="login">
			<form action="acc_finish.php" method="post" id="auto_submit">
				<input type="hide" name="action" value="<?php if ($logged_in) echo "logout"; else echo "login";?>">
				<input type="hide" name="usr" value="<?php echo $usr;?>">
				<input type="hide" name="pass" value="<?php echo $pass;?>">
				<input type="submit">
			</form>	
			<?php
				if ($logged_in || $valid) {
					echo "<script> submit_form();</script>";
				}
			?>
			<div class="top_box">
				<img src="../img/gaugau.png" height="100%">
			</div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login_box">
				<span class="error"><?php echo $err;?></span>
				<h4>User name: </h4>
				<input type="text" placeholder="Enter user name" value="<?php echo $usr;?>" name="usr" id="usr">
				<h4>Password: </h4>
				<input type="password" placeholder="Enter password" value="<?php echo $pass;?>" name="pass" id="pass">
				<button type="submit" id="login_bt">Login</button>
				<button type="button" onclick="location.href='signup.php'" id="signup_bt">Signup</button>
			</form>	
			<div class="bottom_box">
				<p class="inline">Sign in with: </p>
				<img src="../img/google.svg" height="60%" class="logo">
				<img src="../img/facebook.svg" height="60%" class="logo">
				<img src="../img/twitter.svg" height="60%" class="logo">
			</div>		
		</div>
	</body>
</html>