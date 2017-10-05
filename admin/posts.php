<?php
	$tab = "Posts";
	include 'delete.php';
?>


<div class="posts">
	<h1>Posts</h1>
	<?php include '../html/3button.html';?>
	<table class="table">
		<tr>
			<td><input type="checkbox" id="all"></td>
			<td><strong>ID</strong></td>
			<td><strong>Title</strong></td>
			<td><strong>Status</strong></td>
			<td><strong>Categories</strong></td>
			<td><strong>Author</strong></td>
			<td><strong>View</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		<?php
			$sql = "SELECT * FROM posts";
			$data = $db->query($sql);
			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()) {
					if ($row['status'] == 0) {
						$row['status'] = "Hide";
					}
					else if ($row['status'] == 2) {
						$row['status'] = "Show";
					}
					else {
						
					}
					
					echo '
						<tr>
							<td><input type="checkbox" value="'.$row['id'].'"></td>
							<td>'.$row['id'].'</td>
							<td>'.$row['title'].'</td>
							<td>'.$row['status'].'</td>
							<td>'.$row['cate_1_id'].'</td>
							<td>'.$row['author_id'].'</td>
							<td>'.$row['view'].'</strong></td>
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
<?php $db->close();?>