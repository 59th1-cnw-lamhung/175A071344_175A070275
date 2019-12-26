

<?php require_once("../includes/connection.php"); ?>

<?php
    $message = '';
	if (isset($_POST["create_majors"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$MANGANHHOC = $_POST["MANGANHHOC"];
		$TENNGANHHOC = $_POST["TENNGANHHOC"];
		
 
		$sql = "INSERT INTO nganhhoc VALUES ('$MANGANHHOC', '$TENNGANHHOC')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);

		$message = '<label class="text-success">Tạo ngành học thành công</label>';
		
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
				<div class="panel-heading"><h4>Tạo ngành học</h4></div>
				<div class="panel-body">
					
					<form action="create_majors.php" method="POST">
						

						
							<div class="form-group">
								<label>Mã ngành học</label>
								<input type="text" name="MANGANHHOC" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Tên ngành học</label>
								<input type="text" name="TENNGANHHOC" class="form-control" required/>
							</div>
					    



		                    <div class="form-group" >

									<input type="submit" name="create_majors"  value="Tạo ngành" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>
					    
                         <?php echo $message; ?>                   
					</form>
					
				</div>
			</div>
		</div>
		
	</body>
</html>