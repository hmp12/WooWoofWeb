<!DOCTYPE html>

<html>
	<head>
		<title>Sign up</title>
		<?php
			include '../html/head.html';
		?>
	</head>

	<?php
		include '../php/form.php';
		
		$valid = False;
		$name = $usr = $email = $pass = $re_pass = $gender = "";
		$nameErr = $usrErr = $emailErr = $passErr = $re_passErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valid = True;
			if (empty($_POST["name"])) {
				$nameErr = "Full name is required";
				$valid = False;
			}
			else {
				$name = re_form($_POST["name"]);
				if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
					$nameErr = "Only letter";
					$valid = False;
				}
			}
			if (empty($_POST["usr"])) {
				$usrErr = "User name is required";
				$valid = False;
			}
			else {
				$usr = re_form($_POST["usr"]);
				if (!preg_match("/^[a-zA-Z0-9_]*$/", $usr)) {
					$usrErr = "Only letter and number";
					$valid = False;
				}
			}
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
				$valid = False;
			}
			else {
				$email = re_form($_POST["email"]);
				 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				 	$emailErr = "Invalid email format"; 
				 	$valid = False;
				 }
			}
			if (empty($_POST["pass"])) {
				$passErr = "Password is required";
				$valid = False;
			}
			else {
				$pass = re_form($_POST["pass"]);
				if (empty($_POST["re_pass"]) || $_POST["re_pass"] != $pass) {
					$re_passErr = "Password not match";
					$valid = False;
				}
			}
			if (isset($_POST["gender"])) {
				$gender = $_POST["gender"];
			}

			include '../php/database.php';
			$db = new Database();
			$db->connect();
			$sql = "SELECT * FROM user";
			$data = $db->query($sql);
			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()) {
					if ($usr == $row["usr"]) {
						$usrErr = "Username has already existed";
						$valid = False;
					}
					if ($email == $row["email"]) {
						$emailErr = "This email has already used";
						$valid = False;
					}
				}
			}
			if ($valid) { 
				$sql = "INSERT INTO user (name, usr, email, pass, gender)
				VALUE ('$name', '$usr', '$email', '$pass', '$gender')";
				$db->query($sql);
			} 
			$db->close();
		}
		
	?>

	<body>
		<?php include '../html/nar_bar.html';?>
		<div class="signup">
			<form action="acc_finish.php" method="post" id="auto_submit">
				<input type="hide" name="action" value="signup">
				<input type="hide" name="usr" value="<?php echo $usr;?>">
				<input type="hide" name="pass" value="<?php echo $pass;?>">
				<input type="submit">
			</form>	
			<?php
			if ($valid) {
				echo "<script> submit_form();</script>";
			}
			?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signup_box">
				<span class="error">* is required</span>
				<p>Full name: <span class="error">* <?php echo $nameErr?></span></p>
				<input type="text" placeholder="Enter your name" value="<?php echo $name;?>" name="name" id="name">
				<p>User name: <span class="error">* <?php echo $usrErr?></span></p>
				<input type="text" placeholder="Enter user name" value="<?php echo $usr;?>" name="usr" id="usr">
				<p>Email: <span class="error">* <?php echo $emailErr?></p>
				<input type="email" placeholder="Enter user name" value="<?php echo $email;?>" name="email" id="email">
				<p>Password: <span class="error">* <?php echo $passErr?></p>
				<input type="password" placeholder="Enter password" name="pass" id="pass">
				<p>Confirm Password: <span class="error">* <?php echo $re_passErr?></p>
				<input type="password" placeholder="ReEnter password" name="re_pass" id="re_pass">
				<p>Gender</p>
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
				<button type="submit" id="signup_bt">Signup</button>
			</form>		
		</div>	
	
	</body>
</html>