
<?php require_once("../includes/connection.php");?>

<?php
	$sql = "SELECT ID, TENTAIKHOAN, MATKHAU, EMAIL, TRANGTHAI, TEN, MAGIANGVIEN 
	        FROM taikhoan
	        INNER JOIN giangvien
	        where taikhoan.ID = giangvien.MAGIANGVIEN" ;

	$query = mysqli_query($conn,$sql);

	
	
?>

<?php
	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM taikhoan WHERE ID = ".$_GET["id_delete"];
		mysqli_query($conn,$sql);
		$sql = "DELETE FROM giangvien WHERE MAGIANGVIEN = ".$_GET["id_delete"];
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
	        <table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Tên giảng viên</th>
			      <th scope="col">Tài khoản</th>
			      <th scope="col">Mật khẩu</th>
			      <th scope="col">Email</th>
			      
			      <th scope="col">Trạng thái</th>
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
			      <td><?php echo $data['TEN']; ?></td>
			      <td><?php echo $data['TENTAIKHOAN']; ?></td>
			      
			      <td><?php echo md5($data['MATKHAU']); ?></td>
			      <td><?php echo $data['EMAIL']; ?></td>
			      
			      <td><?php echo $data['TRANGTHAI']; ?></td>
			      <td><a href="edit_lecturers.php?id=<?php echo $ID;?>">Sửa</a></td>
			      <td><a href="info_lecturers.php?id_delete=<?php echo $ID;?>">Xóa</a></td>

			    </tr>
			    <?php } ?>
			  </tbody>
			</table>

	    </body>
	</html>
