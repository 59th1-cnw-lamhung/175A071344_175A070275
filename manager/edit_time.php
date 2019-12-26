<?php require_once("../includes/connection.php");?>
<!DOCTYPE html>
<html>
	<head>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			if (isset($_POST["edit_time"])) {//name chỗ nút cập nhâtj
				//lấy thông tin từ các form bằng phương thức POST
				$MATHOIGIAN = $_POST["MATHOIGIAN"];
				$NAMHOC = $_POST["NAMHOC"];
				$HOCKI = $_POST["HOCKI"];
				$GIAIDOAN = $_POST["GIAIDOAN"];
				
			
				// Viết câu lệnh cập nhật thông tin người dùng
				$sql = "UPDATE thoigianhoc SET NAMHOC = '$NAMHOC', HOCKI = '$HOCKI', GIAIDOAN = 'GIAIDOAN' WHERE MATHOIGIAN = '$MATHOIGIAN'";
				// thực thi câu $sql với biến conn lấy từ file connection.php
				mysqli_query($conn,$sql);
				header('Location: manager.php');
		
			}
		
		$id = -1;
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}
			$sql = "SELECT * FROM thoigianhoc WHERE MATHOIGIAN = '$id'";
			$query = mysqli_query($conn,$sql);
		
		
		?>
		<div class="container" style="width:100%; max-width:600px">
			
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Cập nhật thông tin thời gian</h4></div>
				<div class="panel-body">
					<?php
					while ( $data = mysqli_fetch_array($query) ) {
					
					?>
					<form action="edit_time.php" method="POST">
						
						
					
						<div class="form-group">
							<label>Mã thời gian</label>
							<input type="text" name="MATHOIGIAN" class="form-control" required value="<?php echo $data['MATHOIGIAN']; ?>" readonly/>
						</div>
						<div class="form-group">
							<label>Năm học</label>
							<select name="NAMHOC" class="form-control" class="form-group" value="<?php echo $data['NAMHOC']; ?>">
								<option><?php echo $data['NAMHOC']; ?></option>
								<option>2014 - 2015</option>
								<option>2015 - 2016</option>
								<option>2016 - 2017</option>
								<option>2017 - 2018</option>
								<option>2018 - 2019</option>
								<option>2019 - 2020</option>
							</select>
						</div>
						<div class="form-group">
							<label>Học kì</label>
							<select name="HOCKI" class="form-control" class="form-group" value="<?php echo $data['HOCKI']; ?>">
								<option><?php echo $data['HOCKI']; ?></option>
								<option>Kì 1</option>
								<option>Kì 2</option>
								
							</select>
						</div>
						<div class="form-group">
							<label>Giai đoạn</label>
							<select name="GIAIDOAN" class="form-control" class="form-group" value="<?php echo $data['GIAIDOAN']; ?>">
								<option><?php echo $data['GIAIDOAN']; ?></option>
								<option>Giai đoạn 1</option>
								<option>Giai đoạn 2</option>
								
							</select>
						</div>
						
						<div class="form-group" >
							<input type="submit" name="edit_time" value="Cập nhật" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
						</div>
						
						
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</body>
</html>