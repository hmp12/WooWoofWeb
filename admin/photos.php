<?php
	$tab = "photos";
	include 'delete.php';
?>


<div class="photos">
	<h1>Photos</h1>
	<?php include '../html/3button.html';?>
	<div class="inline round_checkbox">
		<input type="checkbox" id="all">
		<label for="all" class="round_check"></label>
	</div>
	<p class="inline">Check all<br/></p>

	<?php	
		$sql = "SELECT * FROM photos";
		$data = $db->query($sql);
		if ($data->num_rows) {
			while ($row = $data->fetch_assoc()) {
				echo '
					<div class="img_box">
						<input type="checkbox" value="'.$row['id'].'">
						<label class="round_check"></label>
						<img src="../php/getfile.php?url='.$row['url'].'" height="200px" class="image">
					</div>
				';
			}
		}
	?>
	
</div>
<?php $db->close();?>