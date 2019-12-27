<?php require_once("../includes/connection.php"); ?>




<?php
    $message = '';
	if (isset($_POST["new_posts"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$ID = $_POST["ID"];
		$TIEUDE = $_POST["TIEUDE"];
		$NOIDUNG = $_POST["NOIDUNG"];
		$HINHANH = $_POST["HINHANH"];
		$TACGIA = $_POST["TACGIA"];
		
 
		


		$SQL = "SELECT * FROM baiviet WHERE ID = '$ID'";
		$QUERY = mysqli_query($conn,$SQL);
		$NUM = mysqli_num_rows($QUERY);
		


		if($NUM > 0)
        {
	        echo "<script>alert('Đã có ID bài viết này!'); window.location='new_posts.php'</script>";
	        exit;
        } 
        else
        {
                //Lưu thông tin thành viên vào bảng
            $sql = "INSERT INTO baiviet VALUES ( '$ID', '$TIEUDE', '$NOIDUNG', '$HINHANH', '$TACGIA', now(), now())";
		// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);

			$message = "<script>alert('Đã thêm bài viết thành công!'); window.location='new_posts.php'</script>";
	    }


		
	}
 
?>


    
<!DOCTYPE html>
<html>
	<head>
			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../includes/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<br />
		<div class="container" style="width:100%; max-width:800px">
			
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Tạo bài viết</h4></div>
				<div class="panel-body" >
					<form action="new_posts.php" method="post">
						

						
							<div class="form-group" >
								<label>ID bài viết</label>
								<input type="text" name="ID" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Tiêu đề bài viết</label>
								<input type="text" name="TIEUDE" class="form-control" required />
							</div>
					    

					    
							<div class="form-group">
    							<label for="exampleFormControlTextarea1">Nội dung bài viết</label>
    							<textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="NOIDUNG"></textarea>
  							</div>


							<div class="form-group">
							    <label for="exampleFormControlFile1">Hình ảnh</label>
							    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="HINHANH">
							 </div>
						
                            <div class="form-group">
								<label>Tác giả</label>
								<input type="text" name="TACGIA" class="form-control" required />
							</div>


		                    <div class="form-group" >

									<input type="submit" name="new_posts" id="register" value="Tạo bài viết" class="btn btn-success" />
							</div>
							
					   <?php echo $message; ?>
                                            
					</form>
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