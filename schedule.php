<?php require_once("includes/connection.php");?>
<?php include "includes/header.php" ?>

<body>
	<?php
		
	
	$id = -1;
		if (isset($_GET['search'])) {
			$id = $_GET['search'];
		}
		$sql = "SELECT * FROM kehoachgiangday WHERE MAGIANGVIEN = '$id'";
		$query = mysqli_query($conn,$sql);
	
	
	?>
	
	<table class="table table-bordered table-striped" style="margin: 60px 0px;">
		<thead class="bg-success">
			<tr>
				<th scope="col">Mã KHGDDK</th>
				<th scope="col">Mã giảng viên</th>
				<th scope="col">Mã lớp học phần</th>
				<th scope="col">Ngày</th>
				<th scope="col">Thứ</th>
				<th scope="col">Địa điểm</th>
				<th scope="col">Thời gian</th>
				<th scope="col">Nội dung</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			while ( $data = mysqli_fetch_array($query)) {
			
			
			?>
			<tr>
				<th scope="row"><?php echo $data['MAKHGD']; ?></th>
				<td><?php echo $data['MAGIANGVIEN']; ?></td>
				<td><?php echo $data['MALOPHOCPHAN']; ?></td>
				<td><?php echo $data['NGAY']; ?></td>
				<td><?php echo $data['THU']; ?></td>
				<td><?php echo $data['DIADIEM']; ?></td>
				<td><?php echo $data['THOIGIAN']; ?></td>
				<td><?php echo $data['NOIDUNG']; ?></td>
				
				
			</tr>
			<?php } ?>
		</tbody>
	</table>



	<?php
		
	
	$id = -1;
		if (isset($_GET['search'])) {
			$id = $_GET['search'];
		}
		$sql = "SELECT * FROM lichtrinhthucte WHERE MAGIANGVIEN = '$id'";
		$query = mysqli_query($conn,$sql);
	
	
	?>
	
	<table class="table table-bordered table-striped" style="margin: 60px 0px;">
		<thead class="bg-success">
			<tr>
				<th scope="col">Mã LTTT</th>
				<th scope="col">Mã KHGDDK</th>
				<th scope="col">Mã giảng viên</th>
				<th scope="col">Mã lớp học phần</th>
				<th scope="col">Ngày</th>
				<th scope="col">Thứ</th>
				<th scope="col">Địa điểm</th>
				<th scope="col">Thời gian</th>
				<th scope="col">Nội dung</th>
				<th scope="col">Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ( $data = mysqli_fetch_array($query)) {
			$MAGIANGVIEN = $data['MAGIANGVIEN'];
			
			?>
			<tr>
				<th scope="row"><?php echo $data['MALTT']; ?></th>
				<th><?php echo $data['MAKHGD']; ?></th>
				<td><?php echo $data['MAGIANGVIEN']; ?></td>
				<td><?php echo $data['MALOPHOCPHAN']; ?></td>
				<td><?php echo $data['NGAY']; ?></td>
				<td><?php echo $data['THU']; ?></td>
				<td><?php echo $data['DIADIEM']; ?></td>
				<td><?php echo $data['THOIGIAN']; ?></td>
				<td><?php echo $data['NOIDUNG']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	
</body>
<?php include "includes/footer.php" ?>