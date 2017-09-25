<!DOCTYPE HTML>
<html>  
	<head>
		<meta charset='utf-8'>
		<title>Thời khóa biểu</title>
		<link rel="stylesheet" type="text/css" href="../css/tkb.css">
	</head>
	<?php
		function re_day($day) {
			switch ($day) {
				case '1':
					return "Thứ 2";
				case '2':
					return "Thứ 3";
				case '3':
					return "Thứ 4";
				case '4':
					return "Thứ 5";
				case '5':
					return "Thứ 6";
				case '6':
					return "Thứ 7";
				case '7':
					return "Chủ Nhật";
				default:
					return "";
			}
		}
		function re_begin($begin) {
			switch ($begin) {
				case '1':
					return "06:45";
				case '2':
					return "07:35";
				case '3':
					return "08:30";
				case '4':
					return "09:20";
				case '5':
					return "10:15";
				case '6':
					return "11:05";
				case '7':
					return "12:30";
				case '8':
					return "13:20";
				case '9':
					return "14:15";
				case '10':
					return "15:05";
				case '11':
					return "16:00";
				case '12':
					return "16:50";
				default:
					return "";
			}
		}
		function re_end($end) {
			switch ($end) {
				case '1':
					return "07:30";
				case '2':
					return "08:20";
				case '3':
					return "09:15";
				case '4':
					return "10:05";
				case '5':
					return "11:00";
				case '6':
					return "11:50";
				case '7':
					return "13:15";
				case '8':
					return "14:05";
				case '9':
					return "15:00";
				case '10':
					return "15:50";
				case '11':
					return "16:45";
				case '12':
					return "17:35";
				default:
					return "";
			}
		}
	?>
	<body>
		<div class="wrapper">
			<div class="head">
				<h1>Thời khóa biểu</h1>
			</div>
			<form action="" method="post" class="upload">
				<button type="button" onclick="document.getElementById('file').click()" id="button"><strong>Chọn file</strong></button>
				<input type="file" name="tkb" onchange="this.form.submit()" id="file">
			</form>
			<?php
				
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (file_exists($_POST['tkb'])) {
						$file = fopen($_POST['tkb'], "r");
						echo '
							<table>
								<tr class="row0">
									<td><strong>Ngày</strong></td>
									<td><strong>Thời gian</strong></td>
									<td><strong>Phòng học</strong></td>
									<td><strong>Mã HP</strong></td>
									<td><strong>Tên HP</strong></td>
								</tr>
						';
						while (!feof($file)) {
							$day = $begin = $end = $room = $object_id = $object = "";
							fscanf($file, "%d%d%d%s%s%[^\n]s", $day, $begin, $end, $room, $object_id, $object);
							$day = re_day($day);
							$begin = re_begin($begin);
							$end = re_end($end);
							if ($day != "" && $begin != "" && $end != "" && $room != "" && $object_id != "" && $object != "") {
								echo '
								<tr>
									<td>'.$day.'</td>
									<td>'.$begin.' - '.$end.'</td>
									<td>'.$room.'</td>
									<td>'.$object_id.'</td>
									<td>'.$object.'</td>
								</tr>
							';
							}
							
						}

					echo '</table>';
					}
					else {
						echo "File không hợp lệ";
					}
				}
			?>
		</div>
	</body>
</html>