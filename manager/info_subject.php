<?php require_once("../includes/connection.php");?>



<?php
	$sql = "SELECT MANGANHHOC, MAMONHOC, TENMONHOC, SOTIN 
	        FROM monhoc";
	$query = mysqli_query($conn,$sql);
?>

<?php
	if (isset($_GET["id_delete"])) {
		
		$sql = 'DELETE FROM monhoc WHERE MAMONHOC LIKE "' . $_GET["id_delete"] . '"';


		mysqli_query($conn,$sql);
		
		echo "<script>alert('Xóa thành công !'); window.location='info_subject.php'</script>";
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
			      <th scope="col">Mã ngành học</th>
			      <th scope="col">Mã môn học</th>
			      <th scope="col">Tên môn học</th>
			      <th scope="col">Số tín chỉ</th>
			      <th scope="col">Sửa</th>
			      <th scope="col">Xóa</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
		            while ( $data = mysqli_fetch_array($query)) {
				       $MAMONHOC = $data['MAMONHOC'];
			           
	            ?>
			    <tr>
			      <th scope="row"><?php echo $data['MANGANHHOC']; ?></th>
			      <td><?php echo $data['MAMONHOC']; ?></td>
			      <td><?php echo $data['TENMONHOC']; ?></td>
			      <td><?php echo $data['SOTIN']; ?></td>
			      <td><a href="edit_subject.php?id=<?php echo $MAMONHOC;?>">Sửa</a></td>
			      <td><a href="info_subject.php?id_delete=<?php echo $MAMONHOC;?>">Xóa</a></td>

			    </tr>
			    <?php } ?>
			  </tbody>
			</table>

	    </body>
	</html>