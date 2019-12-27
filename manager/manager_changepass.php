<?php require_once("../includes/connection.php"); ?>
<?php session_start() ?>
<?php
    $message = '';
	if (isset($_POST["manager_changepass"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$MATKHAUCU = $_POST["MATKHAUCU"];
		$MATKHAUMOI = $_POST["MATKHAUMOI"];
		$NLMATKHAUMOI = $_POST["NLMATKHAUMOI"];
		
        $MATKHAUOLD = md5($MATKHAUCU);
        $MATKHAUNEW = md5($MATKHAUMOI);
        $MATKHAURE = md5($NLMATKHAUMOI);
         


		$DOIMATKHAU = mysqli_query($conn, "SELECT * from taikhoan where ID = ".$_SESSION['ID']);
		
		$DOIMATKHAU1 = mysqli_fetch_array($DOIMATKHAU);
		
		$data_pwd = $DOIMATKHAU1['MATKHAU'];
		
		if($data_pwd == $MATKHAUOLD){
		
		if($MATKHAUNEW == $MATKHAURE){
	    $update_pwd = mysqli_query($conn, 
	    	"UPDATE taikhoan set MATKHAU = '$MATKHAUNEW' where ID = ".$_SESSION['ID']);

			echo "<script>alert('Đổi mật khẩu thành công!'); window.location='manager.php'</script>";
		}
		else{
			echo "<script>alert('Mật khẩu với và mật khẩu mới nhập lại không trùng nhau! Yêu cầu nhập lại'); window.location='manager.php'</script>";
		}
	}
	else
	{
		echo "<script>alert('Mật khẩu cũ của bạn sai!'); window.location='manager.php'</script>";
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
				<div class="panel-heading"><h4>Đổi mật khẩu</h4></div>
				<div class="panel-body">
					
					<form action="manager_changepass.php" method="POST">

						
							<div class="form-group">
								<label>Mật khẩu cũ</label>
								<input type="password" name="MATKHAUCU" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Mật khẩu mới</label>
								<input type="password" name="MATKHAUMOI" class="form-control" required/>
							</div>
							<div class="form-group">
								<label>Nhập lại mật khẩu mới</label>
								<input type="password" name="NLMATKHAUMOI" class="form-control" required/>
							</div>
					    



		                    <div class="form-group" >

									<input type="submit" name="manager_changepass"  value="Đổi mật khẩu" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>

					    
                         <?php echo $message; ?>                   
					</form>
					
				</div>
			</div>
		</div>
		
	</body>
</html>