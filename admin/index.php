<?php
	include '../php/init.php';
	/*
	if ($user == '') {
		header('Location: ../account/login_out.php');
		die();
	}
	else {

	}
	*/
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php 
			include '../html/head.html';
			include '../html/froala.html';
		?>
		<script type="text/javascript" src="../js/admin.js"></script>
	</head>

	<body>
		<?php include '../html/nar_bar.html';?>
		<div class="page">
			<?php include '../html/side_bar.html';?>
			<div class="content">
				<script type="text/javascript">
				    var tag = "";  
				</script>
				<?php 
					if (isset($_GET['tab'])) {
						$tab = $_GET['tab'];
						echo '
							<script type="text/javascript">
							    var tab = "'.$tab.'";
							</script>
						';
						include $tab.'.php';
					}
					else echo '';
				?>
			</div>
		</div>
	</body>
</html>