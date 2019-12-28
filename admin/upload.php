

<?php
$conn = mysqli_connect("localhost","root","","csdl_btl_cnw");
error_reporting(0);
require_once("../style/vendor/upload_library/php-excel-reader/excel_reader2.php");
require_once("../style/vendor/upload_library/SpreadsheetReader.php");

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $ID = "";
                if(isset($Row[0])) {
                    $ID = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $TENTAIKHOAN = "";
                if(isset($Row[1])) {
                    $TENTAIKHOAN = mysqli_real_escape_string($conn,$Row[1]);
                }
                
                if (!empty($name) || !empty($description)) {
                    $query = "insert into taikhoan(ID, TENTAIKHOAN) values('".$ID."','".$TENTAIKHOAN."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
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
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
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

