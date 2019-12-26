<?php require_once("includes/connection.php");?>
<!DOCTYPE html>
<html lang="en"><head>
    <title>.: ĐẠI HỌC THỦY LỢI :.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="style/js/bootstrap.js"></script>
    <script type="text/javascript" src="style/js/1.js"></script>
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/font-awesome.css">
    <link rel="stylesheet" href="style/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >
    
    
    <div class="header">
        <header>
            <div class="title">
                <span class="text_left">HỆ THỐNG ĐĂNG KÍ HỌC - ĐẠI HỌC THỦY LỢI </span>
            </div>
            
            <nav class="nav-right">
                <ul>
                    <li><a href="index.php">Trang chủ |</a></li>
                    <li><a href="login.php">Đăng nhập |</a></li>
                    <li><a href="">Hỏi đáp |</a></li>
                    <li><a href="">Trợ giúp</a></li>
                    <select>
                        <option value="">VN</option>
                    </select>
                </ul>
            </nav>
        </header>
    </div>
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
            echo '<script language="javascript">';
            echo 'alert("BẠN PHẢI NHẬP DỮ LIỆU")';
            echo '</script>';
            }
            else
            {
            $sql = "SELECT * FROM GIANGVIEN WHERE TEN like '%$search%'";
            // Thực thi câu truy vấn
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
            echo '<table class="table" border="1"  cellspacing="0" cellpadding="10">';
                echo '<thead class="bg-primary">';
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
                    echo'<td><a href="shedule.php?search='.$data['MAGIANGVIEN'].'">XEM</a></td>';
                echo '</tr>';
            echo '</table>';
            }
            }
            else {
            echo '<script language="javascript">';
            echo 'alert("kHÔNG TÌM THẤY")';
            echo '</script>';
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