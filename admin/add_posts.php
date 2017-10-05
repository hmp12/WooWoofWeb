<div class="add_posts">
	<h1>Add Posts</h1>
	<button class="button" id="back">Back</button>
	<form action="#" method="post">
		<p>Title</p>
		<input type="text" width="900px" name="title" value="" class="text">
		<p>Url</p>
		<input type="text" name="url" value="" class="text">
		<p>Body</p>
		<div class="textarea">
			<textarea name="body"></textarea>
			<script> $('textarea').froalaEditor({
				theme: 'custom',
				heightMin: 100,
				heightMax: 300,
				quickInsertTags: ['']
			});</script>
		</div>
		<input type="submit" value="Post" class="button">
	</form>
</div>