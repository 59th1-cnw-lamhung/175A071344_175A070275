<?php require_once("../includes/connection.php");?>

<?php
	$sql = "SELECT MALOPHOCPHAN, MALOPMONHOC, TENLOPHOCPHAN, MALOPMONHOC, MAGIANGVIEN, MATHOIGIAN 
	        FROM lophocphan";
	$query = mysqli_query($conn,$sql);
?>

<?php
	if (isset($_GET["id_delete1"])) {
		

		$sql = 'DELETE FROM lophocphan WHERE MALOPHOCPHAN LIKE "' . $_GET["id_delete1"] .'"';

		mysqli_query($conn,$sql);

		echo "<script>alert('Xóa thành công !'); window.location='info_sectionclass.php'</script>";
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
			      <th scope="col">Mã lớp học phần</th>
			      <th scope="col">Tên lớp học phần</th>
			      <th scope="col">Mã lớp môn học</th>
			      <th scope="col">Mã giảng viên</th>
			      <th scope="col">Mã thời gian</th>
			      <th scope="col">Sửa</th>
			      <th scope="col">Xóa</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
		            while ( $data = mysqli_fetch_array($query)) {
				       $MALOPHOCPHAN = $data['MALOPHOCPHAN'];
			           
	            ?>
			    <tr>
			      <th scope="row"><?php echo $data['MALOPHOCPHAN']; ?></th>
			      <td><?php echo $data['TENLOPHOCPHAN']; ?></td>
			      <td><?php echo $data['MALOPMONHOC']; ?></td>
			      <td><?php echo $data['MAGIANGVIEN']; ?></td>
			      <td><?php echo $data['MATHOIGIAN']; ?></td>
			      <td><a href="edit_sectionclass.php?id=<?php echo $MALOPHOCPHAN;?>">Sửa</a></td>
			      <td><a href="info_sectionclass.php?id_delete1=<?php echo $MALOPHOCPHAN;?>">Xóa</a></td>

			    </tr>
			    <?php } ?>
			  </tbody>
			</table>

	    </body>
	</html>