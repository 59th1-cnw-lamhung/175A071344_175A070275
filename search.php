<?php require_once("includes/connection.php");?>



<?php session_start(); ?>

<?php include "includes/header.php" ?>


    <body>
        <main>
            <div class="main">
                <table id="TbSeach" cellSpacing="0" width="100%">
                    <tbody>
                        <tr>
                            <div align="left " style="padding-top: 60px;">
                                <form action="search.php" method="get" >Thông tin giảng viên (họ, tên): <input type="text" name="search" />
                                <input type="submit" name="ok" value="Tìm kiếm" />
                            </form>
                        </div>
                        <tr>
                            <td height="20"></td>
                        </tr>
                        <tr>
                            <td align="left"><span id="lblOrderBy">Sắp xếp theo</span>
                            <input id="rdoHoTen" type="radio" name="orderby" value="rdoHoTen" checked="checked" /><label for="rdoHoTen">Họ, tên</label>
                            <input id="rdoKhoa_BoMon" type="radio" name="orderby" value="rdoKhoa_BoMon" /><label for="rdoKhoa_BoMon">Khoa, bộ môn</label>
                        </td>
                        </tr>
                        <tr>
                        <td colspan="3">
                            <img id="Image1" src="style/images/Teacher_schedule.jpg" />
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div style="margin-top: 30px;">
            <?php
            // Nếu người dùng submit form thì thực hiện
            if (isset($_REQUEST['ok']))
            {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
            
            echo "<script>alert('Bạn phải nhập dữ liệu!'); window.location='search.php'</script>";

            
            }
            else
            {
            $sql = "SELECT * FROM GIANGVIEN WHERE TEN like '%$search%'";
            // Thực thi câu truy vấn
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
            echo '<table class="table" border="1"  cellspacing="0" cellpadding="10">';
                echo '<thead class="bg-success">';
                    echo '<tr>';
                        echo '<th scope="col">Mã Giảng Viên</th>';
                        echo '<th scope="col">Tên</th>';
                        echo '<th scope="col">Địa Chỉ</th>';
                        echo '<th scope="col">SĐT</th>';
                        echo '<th scope="col">Xem lịch</th>';
                    echo '</tr>';
                echo'</thead>';
                while($data = mysqli_fetch_assoc($query)){
                echo '<tr>';
                    echo '<td>'.$data['MAGIANGVIEN'].'</td>';
                    echo '<td>'.$data['TEN'].'</td>';
                    echo '<td>'.$data['DIACHI'].'</td>';
                    echo '<td>'.$data['SDT'].'</td>';
                    echo'<td><a href="shedule.php?search='.$data['MAGIANGVIEN'].'">XEM CHI TIẾT</a></td>';
                echo '</tr>';
            echo '</table>';
            }
            }
            else {
            echo "<script>alert('Không tìm thấy!'); window.location='search.php'</script>";
            }
            }
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</main>
<?php include "includes/footer.php" ?>
</body>
</html>