<?php
require('admin/Classes/PHPExcel.php');
require('includes/connection.php');
	
	$id = -1;
		if (isset($_GET['search'])) {
			$id = $_GET['search'];
		}
		$sql = "SELECT * FROM kehoachgiangday WHERE MAGIANGVIEN = '$id'";
		$query = mysqli_query($conn,$sql);
	
	if(isset($_POST['export']))
	{
		$objExcel = new PHPExcel;
		$objExcel->setActiveSheetIndex(0);
		$sheet = $objExcel->getActiveSheet()->setTitle('Trang_tính1');
		$rowCount = 1;
		$sheet->setCellValue('A'.$rowCount,'Mã KHGDDK');
		$sheet->setCellValue('B'.$rowCount,'Mã giảng viên');
		$sheet->setCellValue('C'.$rowCount,'Mã lớp học phần');
		$sheet->setCellValue('D'.$rowCount,'Ngày');
		$sheet->setCellValue('E'.$rowCount,'Thứ');
		$sheet->setCellValue('F'.$rowCount,'Địa điểm');
		$sheet->setCellValue('G'.$rowCount,'Thời gian');
		$sheet->setCellValue('H'.$rowCount,'Nội dung');
		$sheet->getColumnDimension("A")->setAutoSize(true);
		$sheet->getColumnDimension("B")->setAutoSize(true);
		$sheet->getColumnDimension("C")->setAutoSize(true);
		$sheet->getColumnDimension("D")->setAutoSize(true);
		$sheet->getColumnDimension("E")->setAutoSize(true);
		$sheet->getColumnDimension("F")->setAutoSize(true);
		$sheet->getColumnDimension("G")->setAutoSize(true);
		$sheet->getColumnDimension("H")->setAutoSize(true);
		
		$sheet->getStyle('A1:H1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00C0C0C0');
		$sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sql = "SELECT * FROM kehoachgiangday WHERE MAGIANGVIEN = '$id'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$sheet->setCellValue('A'.$rowCount,$row['MAKHGD']);
		$sheet->setCellValue('B'.$rowCount,$row['MAGIANGVIEN']);
		$sheet->setCellValue('C'.$rowCount,$row['MALOPHOCPHAN']);
		$sheet->setCellValue('D'.$rowCount,$row['NGAY']);
		$sheet->setCellValue('E'.$rowCount,$row['THU']);
		$sheet->setCellValue('F'.$rowCount,$row['DIADIEM']);
		$sheet->setCellValue('G'.$rowCount,$row['THOIGIAN']);
		$sheet->setCellValue('H'.$rowCount,$row['NOIDUNG']);
		
		}
		
		$styleArray = array(
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		)
		);
		$sheet->getStyle('A1:H1')->applyFromArray($styleArray);
		$objWrite = new PHPExcel_Writer_Excel2007($objExcel);
		$filename = 'export.xlsx';
		$objWrite->save($filename);
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
		header('Content-Length: ' . filesize($filename));
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: no-cache');
		readfile($filename);
		return;
	
	}
?>

	<?php include "includes/header.php" ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
	
	
	<div class="outer-container">
		<form action="" method="post"
			name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
			<div>
				
				<button type="submit" name="export" style="background-color: #28a745; color: #000024; margin: 50px auto -50px 1200px; ">Xuất File Excel</button>
				
			</div>
			
		</form>
	</div>
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
				
			</tr>
		</thead>
		<tbody>
			<?php
			while ( $data = mysqli_fetch_array($query)) {
			$MAGIANGVIEN = $data['MAGIANGVIEN'];
			
			?>
			<tr>
				<th scope="row"><?php echo $data['MALTTT']; ?></th>
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