<?php require_once("includes/connection.php"); ?>

<?php include "includes/header.php" ?>

<?php include "includes/navbar.php" ?>




<?php
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
	// Lấy ra nội dung bài viết theo điều kiện id
	$sql = "select * from baiviet where ID = $id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>
			
			<?php 
				while ( $data = mysqli_fetch_array($query) ) {
			?>

			<div class="box-right-1">
    			<div class="box-right-1-top">
    				<span>THÔNG TIN CHI TIẾT</span>
    				
    			</div>
    			 
                 <div style="margin: 0px 25px;">
	                <p style="margin-top: 15px; font-size: 20px;"><span><b><?php echo $data['TIEUDE']; ?></b></span></p>
	                 
					<p><i> Thời gian viết bài: <?php echo $data['THOIGIANTAO']; ?></i></p>
                    <p><i> Thời gian đăng bài: <?php echo $data['THOIGIANDANG']; ?></i></p>
                    <br>
					<p><?php echo $data['NOIDUNG']; ?></p>
                    <p style="margin: 10px 20px; padding-top: 100px; font-family: Arial"><b>Tin khác</b></p>
                </div>
					<?php
                        // Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
                        $sql = "select * from baiviet";
                        // Thực hiện truy vấn data thông qua hàm mysqli_query
                        $query = mysqli_query($conn,$sql);
                        ?>
                        <?php
                        // Khởi tạo biến đếm $i = 0
                        $i = 0;
                        // Lặp dữ liệu lấy data từ cơ sở dữ liệu
                        while ( $data = mysqli_fetch_array($query) ) {
                            // Nếu biến đếm $i = 4, tức là vòng lặp chạy tới bài viết thứ tư thì ta thực hiện xuống hàng cho bài viết kế tiếp
                            // Vì mỗi dòng hiển thị, ta chỉ hiển thị 4 bài viết
                           
                        ?>
                        <article>
                            <a href="display.php?id=<?php echo $data['ID']; ?>" style="margin: 10px 40px;"><img src="style/images/viewpost.gif"> <?php echo substr($data["TIEUDE"], 0, 255)." ..."; ?></a>
                           <!-- <a href="display.php?id=<?php //echo $data['id']; ?>" style="text-align: center;"><i style="color: #000;">Xem thêm</i></a>-->
                        </article>
                            <?php
                                
                             }
                        ?>


    			</div>
    		</div>


				
			<?php } ?>




			





<?php include "includes/footer.php" ?>