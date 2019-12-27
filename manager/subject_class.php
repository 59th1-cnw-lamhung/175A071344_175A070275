<?php require_once("../includes/connection.php"); ?>
<?php
$message = '';
	if (isset($_POST["subject_class"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$MALOPMONHOC = $_POST["MALOPMONHOC"];
		$MAMONHOC = $_POST["MAMONHOC"];
		$TENMONHOC = $_POST["TENMONHOC"];
		$SOTINCHI = $_POST["SOTINCHI"];
		
		$SQL = "SELECT * FROM lopmonhoc WHERE MALOPMONHOC = '$MALOPMONHOC'";
		$QUERY = mysqli_query($conn,$SQL);
		$NUM = mysqli_num_rows($QUERY);
		
		if($NUM > 0)
        {
	        echo "<script>alert('Đã có lớp môn học này!'); window.location='subject_class.php'</script>";
	        exit;
        } 
        else
        {
           $sql = "INSERT INTO lopmonhoc VALUES ('$MALOPMONHOC', '$MAMONHOC', '$TENMONHOC', '$SOTINCHI')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);

			$message = "<script>alert('Tạo lớp môn học thành công!');</script>";
	    }


		
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
				<div class="panel-heading"><h4>Tạo lớp môn học</h4></div>
				<div class="panel-body">
					
					<form action="subject_class.php" method="POST">
						
						
						<div class="form-group">
							<label>Mã lớp môn học</label>
							<input type="text" name="MALOPMONHOC" class="form-control" required />
						</div>
						
						<div class="form-group">
							<label>Mã môn học</label>
							<?php
							$sql = mysqli_query($conn,"select * from monhoc") or die(myqli_error($conn));
							if (mysqli_num_rows($sql) > 0) {
							$i=0;
							?>
							<select class="form-control" name = "MAMONHOC">
								<option></option>
								<?php while($row=mysqli_fetch_assoc($sql)) {
								$i++; ?>

								<option><?php echo $row['MAMONHOC']; ?></option>
								<?php }}  ?>
							</select>
						</div>

						<div class="form-group">
							<label>Tên môn học</label>
							<?php
							$sql = mysqli_query($conn,"select * from monhoc") or die(myqli_error($conn));
							if (mysqli_num_rows($sql) > 0) {
							$i=0;
							?>
							<select class="form-control" name = "TENMONHOC">
								<option></option>
								<?php while($row=mysqli_fetch_assoc($sql)) {
								$i++; ?>

								<option><?php echo $row['TENMONHOC']; ?></option>
								<?php }}  ?>
							</select>
						</div>
						

						<div class="form-group">
								<label>Số tín chỉ</label>
								<select name="SOTINCHI" class="form-control" class="form-group">
									<option></option>
		                            <option>1 tín</option>
		                            <option>2 tín</option>
		                            <option>3 tín</option>
		                            <option>4 tín</option>
		                            
		                        </select>
						</div>


						<div class="form-group" >
							<input type="submit" name="subject_class"  value="Tạo lớp môn học" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
						</div>
						
						<?php echo $message; ?>
					</form>
					
				</div>
			</div>
		</div>
		
	</body>
</html>