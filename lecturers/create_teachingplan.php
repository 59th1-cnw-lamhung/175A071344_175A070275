<?php require_once("../includes/connection.php"); ?>
<?php session_start(); ?>
<?php
$message = '';
	if (isset($_POST["create_teachingplan"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$MAKHGD = $_POST["MAKHGD"];
		$MAGIANGVIEN = $_POST["MAGIANGVIEN"];
		$MALOPHOCPHAN = $_POST["MALOPHOCPHAN"];
		$NGAY = $_POST["NGAY"];
		$THU = $_POST["THU"];
		$DIADIEM = $_POST["DIADIEM"];
		$THOIGIAN = $_POST["THOIGIAN"];
		$NOIDUNG = $_POST["NOIDUNG"];
		
		
		$sql = "INSERT INTO kehoachgiangday
		VALUES('$MAKHGD', '$MAGIANGVIEN', '$MALOPHOCPHAN', '$NGAY', '$THU', '$DIADIEM', '$THOIGIAN', '$NOIDUNG')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		$message = '<label class="text-success">Tạo kế hoạch giảng dạy dự kiến thành công</label> ';
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="container" style="width:100%; max-width:600px">
			
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Tạo kế hoạch giảng dạy dự kiến</h4></div>
				<div class="panel-body">
					
					<form action="create_teachingplan.php" method="POST">
						
						
						<div class="form-group">
							<label>Mã kế hoach giảng dạy dự kiến</label>
							<input type="text" name="MAKHGD" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Mã giảng viên</label>
							<input type="number" name="MAGIANGVIEN" class="form-control"
							value="<?php echo $_SESSION['ID'] ?>" readonly/>
						</div>
						
						<div class="form-group">
							<label>Mã lớp học phần</label>
							<?php
							$sql = mysqli_query($conn,"select * from lophocphan") or die(myqli_error($conn));
							if (mysqli_num_rows($sql) > 0) {
							$i=0;
							?>
							<select class="form-control" name = "MALOPHOCPHAN" required>
								<option></option>
								<?php while($row=mysqli_fetch_assoc($sql)) {
								$i++; ?>
								<option><?php echo $row['MALOPHOCPHAN']; ?></option>
								<?php }}  ?>
							</select>
						</div>

						<div class="form-group">
							<label for="example-date-input" class="col-2 col-form-label">Ngày</label>
							<div class="col-10">
								<input class="form-control" type="date" name="NGAY" id="example-date-input">
							</div>
						</div>

						<div class="form-group">
							<label>Thứ</label>
							<select name="THU" class="form-control" class="form-group" required>
								<option></option>
								<option>Thứ 2</option>
								<option>Thứ 3</option>
								<option>Thứ 4</option>
								<option>Thứ 5</option>
								<option>Thứ 6</option>
								
							</select>
						</div>
						
						<div class="form-group">
							<label>Địa điểm</label>
							<input type="text" name="DIADIEM" class="form-control" required/>
						</div>
						
						<div class="form-group">
							<label>Thời gian học</label>
							<select name="THOIGIAN" class="form-control" class="form-group" required>
								<option></option>
								<option>Từ tiết 1 - tiết 3 (Sáng)</option>
								<option>Từ tiết 4 - tiết 6 (Sáng)</option>
								<option>Từ tiết 7 - tiết 9 (Chiều)</option>
								<option>Từ tiết 10 - tiết 12 (Chiều)</option>
								<option>Từ tiết 14 - tiết 16 (Tối)</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nội dung</label>
							<input type="text" name="NOIDUNG" class="form-control" required/>
						</div>
						
						<div class="form-group" >
							<input type="submit" name="create_teachingplan" value="Tạo kế hoạch" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
						</div>
						
						<?php echo $message; ?>
					</form>
					
				</div>
			</div>
		</div>
		
	</body>
</html>