<?php require_once("includes/connection.php");?>
<?php session_start(); ?>

<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php include "includes/header.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
    <main>
        <div class="main">
                <table id="TbSeach" cellSpacing="0" width="100%">
                    <tbody>
                        <tr>
                            <div align="left " style="padding-top: 60px;">
                                <form action="search.php" method="get" >Thông tin giảng viên (họ, tên): <input type="text" name="search" />
                                <input id="submit-btn" type="submit" name="ok" value="Search" />
                            </form>
                        </div>
                        <tr>

    <div style="margin-top: 30px;">
        <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok']))
        {
            echo'                        </tr>
                    </tbody>
                </table>
             </div>';
        // Gán hàm addslashes để chống sql injection
        $search = addslashes($_GET['search']);
        // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
        if (empty($search)) {
        
                    echo "<script>alert('Bạn phải nhập dữ liệu!'); window.location='search.php'</script>";
            
            }
            else
            {
             $sql = "SELECT * FROM giangvien WHERE TEN like '%$search%'";
            // Thực thi câu truy vấn
            $query = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query)>0){
                    echo "<script>";
                    echo ' $( document ).ready(function(){
                        $("#table2").removeAttr("style");
                    })';
                    echo "</script>";
            }

            else {
                echo "<script>alert('Không tìm thấy!'); window.location='search.php'</script>";

            }
            }

            }
            
        else{
            echo '                        <td colspan="3">
                            <img id="Image1" src="style/images/Teacher_schedule.jpg" />
                        </td>
                        </tr>
                    </tbody>
                </table>
    </div>';


            
        }
        mysqli_close($conn);
            ?>
        
    <div id="table2" style="visibility: hidden;">
        <table class="table table-bordered table-striped" style="margin: 60px 0px;">

            <thead class="bg-success">
                <tr>
                    <th scope="col">Mã Giảng Viên</th>
                    <th scope="col">Họ Và Tên</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Xem Thêm</th>
                </tr>
            </thead>
            

            <tbody>
                <?php

                while($data = mysqli_fetch_array($query)) {
                $MAGIANGVIEN = $data['MAGIANGVIEN'];
                ?>
                <tr>
                    <td scope="row"><?php echo $data['MAGIANGVIEN']; ?></td>
                    <td><?php echo $data['TEN']; ?></td>
                    <td><?php echo $data['DIACHI']; ?></td>
                    <td><?php echo $data['SDT']; ?></td>
                    <td><a href="schedule.php?search=<?php echo $MAGIANGVIEN;?>">XEM CHI TIẾT</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

        
    </div>
</div>
</main>
<?php include "includes/footer.php" ?>
</body>
</html>