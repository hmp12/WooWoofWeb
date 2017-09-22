<?php
	$tab = "categories";
	include 'delete.php';
?>

<div class="categories">
	<h1>Categories</h1>
	<?php include '../html/3button.html';?>
	<table class="table">
		<tr>
			<td><input type="checkbox"></td>
			<td><strong>ID</strong></td>
			<td><strong>Label</strong></td>
			<td><strong>Type</strong></td>
			<td><strong>Parent</strong></td>
			<td><strong>Sort</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		<?php
			$sql = "SELECT * FROM categories";
			$data = $db->query($sql);
			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()) {
					if ($row['type'] == 1) {
						$row['type'] = "Large";
					}
					else if ($row['id'] == 2) {
						$row['type'] = "Medium";
					}
					else {
						$row['type'] = "Small";
					}
					
					echo '
						<tr>
							<td><input type="checkbox" value="'.$row['id'].'"></td>
							<td>'.$row['id'].'</td>
							<td>'.$row['label'].'</td>
							<td>'.$row['type'].'</td>
							<td>'.$row['parent_id'].'</td>
							<td>'.$row['sort'].'</strong></td>
							<td>
								<button class="sbutton"><i class="fa fa-pencil-square-o"></i></button>
								<button value="'.$row['id'].'" class="sbutton delete"><i class="fa fa-trash"></i></button>
							</td>
										</tr>
					';
				}
			}
		?>
	</table>
</div>
<?php $db->close();