<?php
	$img = "";
	$success = $fileErr = $imgErr = $upErr = "";
	$valid = False;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!empty($_FILES['img'])) {
			$img = $_FILES['img']['name'];
			foreach ($img as $key => $value) {
				$valid = True;
				$dir = "../../img/upload/";
				$date = date('Y/m/d');
				$year = substr($date, 0, 4);
				$month = substr($date, 5, 2);
				$day = substr($date, 8, 2);
				$name = stripslashes($value);
				$tmp = $_FILES['img']['tmp_name'][$key];
				$size = $_FILES['img']['size'][$key];
				if (!is_dir($dir.$year)) {
					mkdir($dir.$year);
				}
				if (!is_dir($dir.$year.'/'.$month)) {
					mkdir($dir.$year.'/'.$month);
				}
				if (!is_dir($dir.$year.'/'.$month.'/'.$day)) {
					mkdir($dir.$year.'/'.$month.'/'.$day);
				}
				$url = substr($dir.$year.'/'.$month.'/'.$day.'/'.$name, 6);
				$type = pathinfo($url, PATHINFO_EXTENSION);
				if (!file_exists($tmp) || !getimagesize($tmp)) {
					$valid = False;
					$imgErr = $imgErr.$name.', ';
				}
				if ($valid) { 
					if (move_uploaded_file($tmp, '../../'.$url)) {
						$sql = "INSERT INTO photos(url, type, size)
						VALUE ('$url', '$type', '$size')";
						$db->query($sql);
						if ($db->error()) {
							echo $db->error();
						}
						else {
							$success = $name.', ';
						};
					}
					else {
						$upErr = $upErr.$name.', ';
					}
				}

			}
			if ($imgErr) {
				$imgErr = 'There files '.$imgErr.'is not image';
			}
			if ($upErr) {
				$upErr = 'There files '.$upErr.'upload failed';
			}
			if ($success) {
				$success = 'There file '.$success.'upload successfully';
				echo $success;
			}

		}
		else {
			$valid = False;
			$fileErr = "No file selected";
		} 
		$db->close();
	}
		
?>

<div>
	<h1>Add Photos</h1>
	<button class="button" id="back">Back</button>
	<div class="preview">
		<img src="../img/default.png" height="200px" id="pre_img">
	</div>
	<form action="#" enctype="multipart/form-data" method="post">
		<p>Upload photos <span class="error"><?php echo $fileErr.$imgErr.$upErr;?></span></p>
		<input type="button" value="Choose" onclick="$('#up_img').click()" class="file_input button">
		<input type="file" accept="image/*" name="img[]" multiple="true" class="hidden inline" id="up_img">
		<input type="submit" value="Upload" class="inline button">
	</form> 
</div>