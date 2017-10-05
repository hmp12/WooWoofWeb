$(document).ready(function() {
	$('#say').click(function() {
		send();
	});

	function send() {
		$body = $('#body').val();
		$.ajax({
			url: 'send.php',
			type: 'post',
			data: {
				body: $body
			},
			success: function(data) {
				$('#body').val('');
				$('.chatbox').load('mess_log.php');
				$('.chatbox').animate({
					scrollTop: $('.chatbox')[0].scrollHeight
				}, 1000);
			}
		});
	}

	$('.chatbox').load('mess_log.php');
	$('.chatbox').animate({
		scrollTop: $('.chatbox')[0].scrollHeight
	}, 1000);
	/*
	$.ajaxSetup({cache:false});
	setInterval(function() {
		$('.chatbox').load('mess_log.php');
	}, 1000);
	*/
});