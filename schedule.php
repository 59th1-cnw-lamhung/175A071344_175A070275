<?php include "includes/header.php" ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Lịch trình</title>
		<link rel="stylesheet" href="style/css/schedule-style1.css">
	</head>
	<body>
		<div class="title1">
			<h3 align="center">LỊCH GIẢNG DẠY CỦA GIẢNG VIÊN</h3>
		</div>
		<div class="main1">
			<div class="form-group">
				<label>Họ và Tên:</label>
			</div>
			<div class="form-group">
				<label>Học kỳ:</label>
			</div>
			<div class="form-group">
				<label>Giai đoạn:</label>
			</div>
			<div class="form-group">
				<button>Hiển Thị</button>
				<button>Xuất Excel</button>
			</div>
		</div>
		<table width="100%" id="schedule">
			<thead style="size: 100%;" >
				<th>STT</th>
				<th>Môn Học</th>
				<th>Lớp Học Phần</th>
				<th>Địa Điểm</th>
				<th>Thời Gian</th>
				<th>Nội Dung</th>
			</thead>
			<tbody>
				
			</tbody>
	</table>
</body>
</html>
<?php include "includes/footer.php" ?>