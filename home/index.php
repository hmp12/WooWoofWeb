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
		<?php include '../html/head.html';?>
	</head>
	
	<body onload="time_on()"> 
	
		<header>
			<div>
				<!--
				<div class="top_bar">
					<a href="#"><img src="../img/gaugau.png" height="100%"></a>	
				</div>
				-->
				<?php include '../html/nar_bar.html';?>
			</div>
		</header>

		<section class="content1">
			<div class="parallax" id="hello">
				
				<h1>Hello <?php if ($logged_in) {echo $_SESSION["usr"];} else echo "There!!!";?></h1>
				<p id="welcome">Welcome to my site <3</p>
				<button id="hello_bt" onclick="location.href='account/login_out.php'"><span>What is your name?</span></button>
				<?php
					if ($logged_in) echo "<script> logged_in(); </script>";
				?>
			</div>
			<div id="about_me">
				<h1>Who am I?</h1>
				<div id="me">
					<img src="../img/question.svg" width="100%" height="100%" id="qmark">
					<img src="../img/me.jpg" width="100%" height="100%" id="me_picture">
				</div>
				<div id="info">
					<p>Birthday: 12/12/1997</p>
					<p>Hometown: Phú Thọ</p>
					<p>Hobby: Coding, Anime, Manga, Detective Novel, Game</p>
					<p>Studied at:</p>
					<a href="http://chuyensp.edu.vn/" target="_blank" alt="HNUE High School for Gifted Students"><img src="../img/csp.png" width="15%" /></a>
					<a href="https://www.hust.edu.vn/" target="_blank"><img src="../img/hust.png" alt="Hanoi University of Science and Technology" width="10%" /></a>
					<a href="https://soict.hust.edu.vn/" target="_blank"><img src="../img/soict.png" alt="School of Information and Communication Technology" width="10%" /></a>
					<p><br/></p>
					<a href="https://is.hust.edu.vn/" target="_blank">Departmant of Information System</a>
					<a href="tkb.php" target="_blank">TKB</a>
				</div>
			</div>
			<div id="time">
				<h1 id="time_value0"></h1>
				<h1 id="time_value1"></h1>
				<h1 id="time_value2"><strong></strong></h1>
			</div>
			<div>
				<p id="post_value"></p>
			</div>
		</section>

		<div class="footer">
			<div class="contact">
				<p>I'm God of the new world!!!<br/>Contract me: </p>
				<ul id="social">
					<li><img src="../img/facebook.png" width="17px" height="17px"/>
						<a href="https://www.facebook.com/phong.hm.1">Facebook</a></li> 
					<li><img src="../img/gmail.png" width="20px" height="17px"/>
						<a href="mailto:phongpt97@gmail.com">Gmail</a></li> 
				</ul>
				<strong> &copy <?php echo date("Y"); ?> HMP </strong>
			</div>
		</div>	
	</body>
</html>
