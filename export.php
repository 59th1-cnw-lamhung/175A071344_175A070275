<?php 
/*require('admin/Classes/PHPExcel.php');
require('includes/connection.php');*/


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

    $sheet->getStyle('A1:H1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00C0C0C0');
    $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $id = -1;
        if (isset($_GET['search'])) {
            $id = $_GET['search'];
        }


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

<!DOCTYPE html>
    <html>
        <head>
                
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
    <body>
        
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                
                <button type="submit" name="export" style="background-color: #28a745; color: #000024; margin: 50px auto -50px 1200px; ">Xuất File Excel</button>
        
            </div>
        
        </form>
    </div>

    
    </body>
 </html>