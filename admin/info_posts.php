<?php require_once("../includes/connection.php");?>



<?php
	$sql = "SELECT * FROM baiviet";
	$query = mysqli_query($conn,$sql);
?>

<?php
	if (isset($_GET["id_delete"])) {
		
		$sql = 'DELETE FROM baiviet WHERE ID = '.$_GET["id_delete"];


		mysqli_query($conn,$sql);
		
		
	}
	
?>

<!DOCTYPE html>
	<html>
		<head>
				
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>
		<body>
	        <table class="table table-bordered">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">ID </th>
			      <th scope="col">Tiêu đề</th>
			      <th scope="col">Nội dung</th>
			      <th scope="col">Hình ảnh</th>
			      <th scope="col">Tác giả</th>
			      <th scope="col">Thời gian tạo</th>
			      <th scope="col">Thời gian đăng</th>
			      <th scope="col">Sửa</th>
			      <th scope="col">Xóa</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
		            while ( $data = mysqli_fetch_array($query)) {
				       $ID = $data['ID'];
			           
	            ?>
			    <tr>
			      <th scope="row"><?php echo $data['ID']; ?></th>
			      <td><?php echo $data['TIEUDE']; ?></td>
			      <td><?php echo $data['NOIDUNG']; ?></td>
			      <td><img src="<?php echo 'http://localhost/175A070275_175A071344/BTL_CNW_VIETCAO/style/images/'.$data['HINHANH']?>" width="100%" alt=""></td>
			      <td><?php echo $data['TACGIA']; ?></td>
			      <td><?php echo $data['THOIGIANTAO']; ?></td>
			      <td><?php echo $data['THOIGIANDANG']; ?></td>
			      <td><a href="edit_posts.php?id=<?php echo $ID;?>">Sửa</a></td>
			      <td><a href="info_posts.php?id_delete=<?php echo $ID;?>">Xóa</a></td>

			    </tr>
			    <?php } ?>
			  </tbody>
			</table>

	    </body>
	</html>