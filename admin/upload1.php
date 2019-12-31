<?php 
include('../includes/connection.php');
require("Classes/PHPExcel.php");

if(isset($_POST['import']))
{
    
	$file = $_FILES['file']['tmp_name'];
	
	$objReader =PHPExcel_IOFactory::createReaderForFile($file);

   
	$objReader -> setLoadSheetsOnly('Trang_tính1');

	$objEX = $objReader->load($file);
	$sheetData = $objEX -> getActiveSheet()->toArray('null',true,true,true);

	//print_r($sheetData);
	$highRow = $objEX->setActiveSheetIndex()-> getHighestRow();
	//echo $highRow;
	for($row =2; $row <= $highRow; $row++ )
	{

		$ID = $sheetData[$row]['A'];
		$TENTAIKHOAN = $sheetData[$row]['B'];
		$EMAIL = $sheetData[$row]['C'];
		$QUYEN = $sheetData[$row]['D'];

		$MATKHAUSO = rand(100000,999999);
        $MATKHAUMAHOA = md5($MATKHAUSO);
        $MAKICHHOAT = md5(rand());


        $MATKHAU = $MATKHAUMAHOA;
       
        $MAKICHHOAT = $MAKICHHOAT;
       
        $TRANGTHAI = 'CHUAXACMINH';

      

        $sql = mysqli_query($conn, "INSERT INTO taikhoan 
        (ID, TENTAIKHOAN, MATKHAU, EMAIL, MAKICHHOAT, QUYEN, TRANGTHAI) 
        VALUES ('$ID', '$TENTAIKHOAN', '$MATKHAU', '$EMAIL', '$MAKICHHOAT', '$QUYEN', '$TRANGTHAI')
        ");


		/*$sql = mysqli_query($conn, "INSERT INTO taikhoan (ID, TENTAIKHOAN, EMAIL, QUYEN)
        VALUES ('$ID','$TENTAIKHOAN','$EMAIL','$QUYEN')");*/

        if($QUYEN == 2){
        	$ID = $sheetData[$row]['A'];
        	$TEN = $sheetData[$row]['E'];
			$DIACHI = $sheetData[$row]['F'];
			$SDT = $sheetData[$row]['G'];
			

		    $sql = mysqli_query($conn, "INSERT INTO quanly (MAQUANLY, TEN, DIACHI, SDT) VALUES ('$ID', '$TEN','$DIACHI','$SDT')");
        }
        else if($QUYEN == 3){
        	$ID = $sheetData[$row]['A'];
        	$TEN = $sheetData[$row]['E'];
			$DIACHI = $sheetData[$row]['F'];
			$SDT = $sheetData[$row]['G'];
			

		    $sql = mysqli_query($conn, "INSERT INTO giangvien (MAGIANGVIEN, TEN, DIACHI, SDT) VALUES ('$ID', '$TEN','$DIACHI','$SDT')");
        }
        else if($QUYEN == 1){
        	$ID = $sheetData[$row]['A'];
        	$TEN = $sheetData[$row]['E'];
			$DIACHI = $sheetData[$row]['F'];
			$SDT = $sheetData[$row]['G'];
			

		    $sql = mysqli_query($conn, "INSERT INTO quantrivien (MAQUANTRIVIEN, TEN, DIACHI, SDT) VALUES ('$ID', '$TEN','$DIACHI','$SDT')");
        }

        $base_url = "http://localhost/175A071344_175A070275/";  //change this baseurl value as per your file path
            $mail_body = "
            <p>Chào ".$TENTAIKHOAN.",</p>
            <p>Cảm ơn! Mật khẩu của bạn là ".$MATKHAUSO.". Mật khẩu này sẽ chỉ hoạt động sau khi xác minh email của bạn.</p>
            <p>Vui lòng mở liên kết này để xác minh địa chỉ email của bạn - ".$base_url."admin/email_verification.php?activation_code=".$MAKICHHOAT."
            <p>Thân,<br />VietCao</p>
            ";
        
        include('../sendmail.php');

         

	}
    echo "<script>alert('Import thành công !'); window.location='upload1.php'</script>";
	/*if($sql)
    	{
            echo "Thành công";
        }
    else
    	echo "Thất bại";*/
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
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
            </div>
        
        </form>
    </div>

    <?php
    $sqlSelect = "SELECT * FROM taikhoan";
    $result = mysqli_query($conn, $sqlSelect);



if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class="table">
              <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên tài khoản</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Email</th>
                <th scope="col">Mã kích hoạt</th>
                <th scope="col">Quyền</th>
                <th scope="col">Trạng thái</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['ID']; ?></td>
            <td><?php  echo $row['TENTAIKHOAN']; ?></td>
            <td><?php  echo $row['MATKHAU']; ?></td>
            <td><?php  echo $row['EMAIL']; ?></td>
            <td><?php  echo $row['MAKICHHOAT']; ?></td>
            <td><?php  echo $row['QUYEN']; ?></td>
            <td><?php  echo $row['TRANGTHAI']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>


<?php 
} 
?>
    </body>
 </html>