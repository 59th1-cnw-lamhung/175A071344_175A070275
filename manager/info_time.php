<?php require_once("../includes/connection.php");?>



<?php
	$sql = "SELECT * FROM thoigianhoc";
	$query = mysqli_query($conn,$sql);
?>

<?php
	if (isset($_GET["id_delete"])) {
		
		$sql = 'DELETE FROM thoigianhoc WHERE MATHOIGIAN LIKE "' . $_GET["id_delete"] .'"';


		mysqli_query($conn,$sql);
		
		echo "<script>alert('Xóa thành công !'); window.location='info_time.php'</script>";
		exit;
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
			      <th scope="col">Mã thời gian</th>
			      <th scope="col">Năm học</th>
			      <th scope="col">Học kì</th>
			      <th scope="col">Thời gian bắt đầu</th>
			      <th scope="col">Thời gian kết thúc</th>
			      <th scope="col">Sửa</th>
			      <th scope="col">Xóa</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
		            while ( $data = mysqli_fetch_array($query)) {
				       $MATHOIGIAN = $data['MATHOIGIAN'];
			           
	            ?>
			    <tr>
			      <th scope="row"><?php echo $data['MATHOIGIAN']; ?></th>
			      <td><?php echo $data['NAMHOC']; ?></td>
			      <td><?php echo $data['HOCKI']; ?></td>
			      <td><?php echo $data['GDBATDAU']; ?></td>
			      <td><?php echo $data['GDKETTHUC']; ?></td>
			      <td><a href="edit_time.php?id=<?php echo $MATHOIGIAN;?>">Sửa</a></td>
			      <td><a href="info_time.php?id_delete=<?php echo $MATHOIGIAN;?>">Xóa</a></td>

			    </tr>
			    <?php } ?>
			  </tbody>
			</table>

	    </body>
	</html>