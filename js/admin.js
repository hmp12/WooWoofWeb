$(document).ready(function() {
	$('input[type="checkbox"]:eq(0)').change(function() {
		$('input[type="checkbox"]').prop('checked',$(this).prop('checked'));
	});
	$('#back').click(function() {
		location.replace("index.php?tab=" + tab.substr(4));
	});
	$('#add').click(function() {
		location.replace("index.php?tab=add_"+tab);
	});
	$('#reload').click(function() {
		location.reload();
	});
	$('#delete').click(function() {
		$confirm = confirm("Are you sure to delete all selected " + tab + "?");
		if ($confirm) {
			console.log("confirm");
			var id = [];
			$('input[type="checkbox"]:checkbox:checked').each(function(i) {
				id[i] = $(this).val();
			});
			if (id.length == 0) {
				alert("Nothing selected to delete");
			}
			else {
				remove(tab, id);
			}
		}
	});
	$('.sbutton.delete').click(function() {
		$confirm = confirm("Are you sure to delete this " + tab + "?");
		if ($confirm) {
			var id = [];
			id[1] = $(this).val();
			remove(tab, id);
		}
	});

	function remove(tab, id) {
		$.ajax({
			url: tab + ".php",
			type: 'POST',
			data: {
				id: id,
				action: "delete"
			},
			success: function(data) {
				$('.content').html(data);
			},
			error: function() {
				alert("Something wrong, please try again");
			}
		});
	}

	$('#up_img').change(function() {
		var length = $(this)[0].files.length;
		var img, src;
		for (var i=1; i<length; i++) {
			src = URL.createObjectURL($(this)[0].files[i]);
			img = "<img src='" + src + "' height='200px'>";
			$('#pre_img').after(img);
		}
		src = URL.createObjectURL($(this)[0].files[0]);
		$('#pre_img').attr("src", src);
	});
	$('.image').click(function() {
		$('.image').not(this).removeClass("clicked");
		$(this).toggleClass("clicked");

	});
});