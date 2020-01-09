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
    if (isset($_POST["edit_teachingschedule1"]))
	{//name chỗ nút cập nhâtj
		//lấy thông tin từ các form bằng phương thức POST
		$MALTTT = $_POST["MALTTT"];
		$MAKHGD = $_POST["MAKHGD"];
		$MAGIANGVIEN = $_POST["MAGIANGVIEN"];
		$MALOPHOCPHAN = $_POST["MALOPHOCPHAN"];
		$NGAY = $_POST["NGAY"];
		$THU = $_POST["THU"];
		$DIADIEM = $_POST["DIADIEM"];
		$THOIGIAN = $_POST["THOIGIAN"];
		$NOIDUNG = $_POST["NOIDUNG"];
	
		// Viết câu lệnh cập nhật thông tin người dùng
		
		// thực thi câu $sql với biến conn lấy từ file connection.php
        


			$sql = "UPDATE lichtrinhthucte SET MAGIANGVIEN = '$MAGIANGVIEN', MALOPHOCPHAN = '$MALOPHOCPHAN', NGAY = '$NGAY', THU = '$THU', DIADIEM = '$DIADIEM', THOIGIAN = '$THOIGIAN', NOIDUNG = '$NOIDUNG' WHERE MALTTT = '$MALTTT'";

			/*$sql = "INSERT INTO lichtrinhthucte(MAKHGD, MAGIANGVIEN, MALOPHOCPHAN, NGAY, THU, DIADIEM, THOIGIAN, NOIDUNG)
			VALUES ('$MAKHGD', '$MAGIANGVIEN', '$MALOPHOCPHAN', '$NGAY', '$THU', '$DIADIEM', '$THOIGIAN', '$NOIDUNG')";
            */
			mysqli_query($conn,$sql);

			//header('Location: info_teachingschedule.php');

			echo "<script>alert('Đã sửa lịch trình thực tế thành công !'); window.location='info_teachingschedule.php'</script>";
	       
	    }


	




    $id = -1;
	if (isset($_GET['id1'])) {
		$id = $_GET['id1'];
	}
    $sql = "SELECT * FROM lichtrinhthucte WHERE MALTTT = '$id'";
	$query = mysqli_query($conn, $sql);

	
      
 
?>


<div class="container" style="width:100%; max-width:600px">

    

	    <div class="panel panel-default">
				<div class="panel-heading"><h4>Cập nhật thông tin lịch trình giảng dạy thực tế</h4></div>
				<div class="panel-body">
					<?php
		              while ( $data = mysqli_fetch_array($query) ) {
		              	
	                ?>
					<form action="edit_teachingschedule1.php" method="POST">
						
                            <div class="form-group" >
								<label>Mã lịch trình thực tế</label>
								<input type="text" name="MALTTT" class="form-control" required value="<?php echo $data['MALTTT']; ?>" readonly/>
							</div>

							<div class="form-group" >
								<label>Mã kế hoạch giảng dạy dự kiến</label>
								<input type="text" name="MAKHGD" class="form-control" required value="<?php echo $data['MAKHGD']; ?>" readonly/>
							</div>


							<div class="form-group">
								<label>Mã giảng viên</label>
								<input type="text" name="MAGIANGVIEN" class="form-control" required value="<?php echo $data['MAGIANGVIEN']; ?>" readonly/>
							</div>

							
							<div class="form-group">
								<label>Mã lớp học phần</label>
								<?php
								$sql = mysqli_query($conn,"select * from lophocphan") or die(myqli_error($conn));
								if (mysqli_num_rows($sql) > 0) {
								$i=0;
								?>
								<select type = "text" class="form-control" name = "MALOPHOCPHAN" value="<?php echo $data['MALOPHOCPHAN']; ?>" required>
									<option><?php echo $data['MALOPHOCPHAN']; ?></option>
									<?php while($row=mysqli_fetch_assoc($sql)) {
									$i++; ?>
									<option><?php echo $row['MALOPHOCPHAN']; ?></option>
									<?php }}  ?>
								</select>
						    </div>


							<div class="form-group">
							<label for="example-date-input" class="col-2 col-form-label">Ngày</label>
							<div class="col-10">
								<input class="form-control" type="date" name="NGAY" id="example-date-input" value="<?php echo $data['NGAY']; ?>">
							</div>
						    </div>

							
							<div class="form-group">
							<label>Thứ</label>
							<select type = "text" name="THU" class="form-control" class="form-group" value="<?php echo $data['THU']; ?>" required>
								<option><?php echo $data['THU']; ?></option>
								<option>Thứ 2</option>
								<option>Thứ 3</option>
								<option>Thứ 4</option>
								<option>Thứ 5</option>
								<option>Thứ 6</option>
								
							</select>
						    </div>



							<div class="form-group">
								<label>Địa điểm</label>
								<input type="text" name="DIADIEM" class="form-control" required value="<?php echo $data['DIADIEM']; ?>"/>
							</div>

							

							<div class="form-group">
							<label>Thời gian học</label>
							<select type = "text" name="THOIGIAN" class="form-control" class="form-group" value="<?php echo $data['THOIGIAN']; ?>" required>
								<option><?php echo $data['THOIGIAN']; ?></option>
								<option>Từ tiết 1 - tiết 3 (Sáng)</option>
								<option>Từ tiết 4 - tiết 6 (Sáng)</option>
								<option>Từ tiết 7 - tiết 9 (Chiều)</option>
								<option>Từ tiết 10 - tiết 12 (Chiều)</option>
								<option>Từ tiết 14 - tiết 16 (Tối)</option>
							</select>
						    </div>

							<div class="form-group">
								<label>Nội dung</label>
								<input type="text" name="NOIDUNG" class="form-control" required value="<?php echo $data['NOIDUNG']; ?>"/>
							</div>


		                    <div class="form-group" >

									<input type="submit" name="edit_teachingschedule1" value="Cập nhật" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>
					    
                                            
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</body>
</html>