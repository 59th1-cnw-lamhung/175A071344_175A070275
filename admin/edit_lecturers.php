
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
	if (isset($_POST["edit_manager"])) {//name chỗ nút cập nhâtj
		//lấy thông tin từ các form bằng phương thức POST
		$ID = $_POST["id"];
		$TENTAIKHOAN = $_POST["user_name"];
		$EMAIL = $_POST["user_email"];
		$TEN = $_POST["name"];
		$DIACHI = $_POST["address"];
		$SDT = $_POST["phone"];
		$QUYEN = $_POST["user_level"];


	
        
		
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE taikhoan SET TENTAIKHOAN = '$TENTAIKHOAN', EMAIL = '$EMAIL', QUYEN = '$QUYEN' WHERE ID = $ID";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		

        if($_POST["user_level"] == "2"){
        	$sql1 = "UPDATE quanly SET TEN = '$TEN', DIACHI = '$DIACHI', SDT = '$SDT' WHERE 	MAQUANLY = $ID";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql1);
		    
        }
        else if($_POST["user_level"] == "3"){
        	$sql = "UPDATE giangvien SET TEN = '$TEN', DIACHI = '$DIACHI', SDT = '$SDT' WHERE MAGIANGVIEN = $ID";
        
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		    
        }

        echo "<script>alert('Cập nhật thông tin thành công !'); window.location='home.php'</script>";

       
	}
 
    $id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}


	$sql = "SELECT TENTAIKHOAN, EMAIL, QUYEN, ID, TEN, DIACHI, SDT, MAGIANGVIEN
	         FROM taikhoan
             INNER JOIN giangvien
             ON taikhoan.ID = giangvien.MAGIANGVIEN
             WHERE taikhoan.ID = ".$id;
	$query = mysqli_query($conn,$sql);
      
 
?>

		
		
	    
		<div class="container" style="width:100%; max-width:600px">

    

	    <div class="panel panel-default">
				<div class="panel-heading"><h4>Cập nhật tài khoản giảng viên</h4></div>
				<div class="panel-body" style="margin-left: -15px;">
					<?php
		              while ( $data = mysqli_fetch_array($query) ) {
		              	
	                ?>
					<form action="edit_lecturers.php" method="POST">
						

						<div class="form-row">
							<div class="form-group col-md-3" >
								<label>ID</label>
								<input type="number" name="id" class="form-control" required value="<?php echo $data['ID']; ?>" readonly/>
							</div>
							<div class="form-group col-md-9">
								<label>Tên tài khoản</label>
								<input type="text" name="user_name" class="form-control" pattern="[a-zA-Z ]+" required style="margin-left: -18px;" value="<?php echo $data['TENTAIKHOAN']; ?>"/>
							</div>
					    </div>

					    <div class="form-row">
							<div class="form-group col-md-6">
								<label>Email</label>
								<input type="email" name="user_email" class="form-control" required value="<?php echo $data['EMAIL']; ?>"/>
							</div>


							<div class="form-group col-md-6">
								<label>Họ và tên</label>
								<input type="text" name="name" class="form-control" required style="margin-left: -18px;" value="<?php echo $data['TEN']; ?>"/>
							</div>
                        </div>
						<div class="form-group col-md-12">
							<label>Địa chỉ</label>
							<input type="text" name="address" class="form-control" required value="<?php echo $data['DIACHI']; ?>"/>
						</div>

						<div class="form-group col-md-12">
							<label>Số điện thoại</label>
							<input type="text" name="phone" class="form-control" required value="<?php echo $data['SDT']; ?>"/>
						</div>


						<div class="form-row">
							<div class="form-group col-md-4" >
		                        <label>Quyền truy cập</label>
		                        
		                        
		                        <select name="user_level" class="form-control" class="form-group">
		                            <option></option>
		                            <option value="2">Quản lý</option>
		                            <option value="3">Giảng viên</option>
		                        </select>
		                    </div>

		                    <div class="form-group" >

									<input type="submit" name="edit_manager" value="Cập nhật" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>
					    </div>
                                            
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</body>
</html>
