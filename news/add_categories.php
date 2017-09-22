<?php
	$label = $url = $type = $sort = $parent = "";
	$labelErr = $urlErr = $typeErr = $sortErr = $parentErr = "";
	$valid = False;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$valid = True;
		if (!empty($_POST['label'])) {
			$label = $_POST['label'];
		}
		else {
			$valid = False;
			$labelErr = "Label is empty";
		}
		if (!empty($_POST['url'])) {
			$url = $_POST['url'];
		}
		else {
			$valid = False;
			$urlErr = "Url is empty";
		}
		if (!empty($_POST['type'])) {
			$type = $_POST['type'];
			if ($type = "large") {
				$type = 1;
				$parent = 0;
			}
			else {
				if ($type = "medium") {
					$type = 2;
				}
				else {
					$type = 3;
				}
				if (!empty($_POST['parent'])) {
					$parent = 0;
				}
				else {
					$valid = False;
					$parentErr = "Parent is empty";
				}
			}
		}
		else {
			$valid = False;
			$typeErr = "Type is empty";
		}
		if (!empty($_POST['sort'])) {
			$sort = $_POST['sort'];
		}
		else {
			$valid = False;
			$sortErr = "Sort is empty";
		}
		
		if ($valid) { 
			$sql = "INSERT INTO categories (label, url, type, sort, parent_id)
			VALUE ('$label', '$url', '$type', '$sort', '$parent')";
			$db->query($sql);
			echo "Add categories success"
		} 
		echo $db->error();
		$db->close();
	}
		
?>

<div class="add_categories">
	<form action="#" method="post">
		<h1>Add Categories</h1>
		<p>Label <span class="error"><?php echo $labelErr;?></span></p>
		<input type="text" value="<?php echo $label;?>" name="label" class="text">
		<p>Url <span class="error"><?php echo $urlErr;?></span></p>
		<input type="text" value="<?php echo $url;?>" name="url" class="text">
		<p>Type <span class="error"><?php echo $typeErr;?></span></p>
		<input type="radio" name="type" value="large">Large
		<input type="radio" name="type" value="medium">Medium
		<input type="radio" name="type" value="small">Small
		<p>Sort <span class="error"><?php echo $sortErr;?></span></p>
		<input type="text" value="<?php echo $sort;?>" name="sort" class="text">
		<p>Parent <span class="error"><?php echo $parentErr;?></span></p>
		<input type="text" name="parent" class="text">
		<input type="submit" value="Add" class="block button">
	</form> 
</div>