<?php require_once("../includes/connection.php");?>

<!DOCTYPE html>
<html>
	<head>
			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../includes/ckeditor/ckeditor.js"></script>
	</head>
	<body>

<?php
	if (isset($_POST["edit_posts"])) {//name chỗ nút cập nhât
		//lấy thông tin từ các form bằng phương thức POST
		$ID = $_POST["ID"];
		$TIEUDE = $_POST["TIEUDE"];
		$NOIDUNG = $_POST["NOIDUNG"];
		$HINHANH = $_POST["HINHANH"];
		$TACGIA = $_POST["TACGIA"];
		$THOIGIANTAO = $_POST["THOIGIANTAO"];
		$THOIGIANDANG = $_POST["THOIGIANDANG"];
		
		
	
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE baiviet SET TIEUDE = '$TIEUDE', NOIDUNG = '$NOIDUNG', HINHANH = '$HINHANH', TACGIA = '$TACGIA', THOIGIANTAO = '$THOIGIANTAO', THOIGIANDANG = '$THOIGIANDANG' WHERE ID = '$ID'";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);

		header('Location: admin.php');
       
	}
 
    $id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}


	$sql = "SELECT * FROM baiviet WHERE ID = '$id'";
	$query = mysqli_query($conn,$sql);
      
 
?>


<div class="container" style="width:100%; max-width:800px">

    

	    <div class="panel panel-default">
				<div class="panel-heading"><h4>Cập nhật thông tin ngành học</h4></div>
				<div class="panel-body">
					<?php
		              while ( $data = mysqli_fetch_array($query) ) {
		              	
	                ?>
					<form action="edit_posts.php" method="POST">
						

						
							<div class="form-group" >
								<label>ID</label>
								<input type="text" name="ID" class="form-control" required value="<?php echo $data['ID']; ?>" readonly/>
							</div>

							<div class="form-group" >
								<label>Tiêu đề</label>
								<input type="text" name="TIEUDE" class="form-control" required value="<?php echo $data['TIEUDE']; ?>"/>
							</div>

							

							<div class="form-group">
    							<label for="exampleFormControlTextarea1">Nội dung bài viết</label>
    							<textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="NOIDUNG"><?php echo $data['NOIDUNG']; ?></textarea>
  							</div>


							<div class="form-group">
							    <label for="exampleFormControlFile1">Hình ảnh</label>
							    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="HINHANH" value="<?php echo $data['HINHANH']; ?>">
							 </div>

							<div class="form-group" >
								<label>Tác giả</label>
								<input type="text" name="TACGIA" class="form-control" required value="<?php echo $data['TACGIA']; ?>"/>
							</div>

							<div class="form-group" >
								<label>Thời gian tạo</label>
								<input type="text" name="THOIGIANTAO" class="form-control" required value="<?php echo $data['THOIGIANTAO']; ?>" readonly/>
							</div>

							<div class="form-group" >
								<label>Thời gian đăng</label>
								<input type="text" name="THOIGIANDANG" class="form-control" required value="<?php echo $data['THOIGIANDANG']; ?>"/>
							</div>

							

		                    <div class="form-group" >

									<input type="submit" name="edit_posts" value="Cập nhật" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>
					    
                                            
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</body>
</html>

<script type="text/javascript">
	$(function() {
		if(CKEDITOR.instances['NOIDUNG']){
			CKEDITOR.remove(CKEDITOR.instances['NOIDUNG'])
		}
		CKEDITOR.config.width = 735;
		CKEDITOR.config.height = 300;
		CKEDITOR.replace('NOIDUNG',{});
	})
</script>
