<?php session_start(); ?>
<?php
require_once("../includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quản trị</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<!--===============================================================================================-->
	</head>
	<body>
		<div class="limiter" >
			<div class="container-login100" style="  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(images/bg-05.jpg);
				background-position: center;
				background-size: cover;
				background-attachment: fixed;">
				<div class="wrap-login100">
					<div class="login100-form-title" style="background-image: url(images/bg-03.jpg);">
						<span class="login100-form-title-1">
							<a class="sidebar-brand d-flex align-items-center justify-content-center " href="#" style="font-size: 40px; color: #fff;">
								<div class="sidebar-brand-icon rotate-n-15">
									
									<i class="fa fa-user-circle"></i>
								</div>
								<div class="sidebar-brand-text mx-3">Đăng Nhập</div>
							</a>
						</span>
					</div>
					<form class="login100-form validate-form" action="login_admin.php" method="post">
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Tài Khoản</span>
							<input class="input100" type="text" name="username" placeholder="Tên Đăng Nhập">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
							<span class="label-input100">Mật Khẩu</span>
							<input class="input100" type="password" name="password" placeholder="Mật Khẩu">
							<span class="focus-input100"></span>
						</div>
						<div class="container-login100-form-btn" style="color: #18aa75;">
							<button class="login100-form-btn" name="btn_submit1" >
							Đăng nhập
							</button>
						</div>
						<?php
															// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
																if (isset($_POST["btn_submit1"])) {
																	// lấy thông tin người dùng
																	$username = $_POST["username"];
																	$password = $_POST["password"];
																	//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
																	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
																	$username = strip_tags($username);
																	$username = addslashes($username);
																	$password = strip_tags($password);
																	$password = addslashes($password);
																	$password1 = md5($password);
																	if ($username == "" || $password =="") {
																		echo "Username hoặc password bạn không được để trống!";
																	}else{
																		$sql = "select * from taikhoan where TENTAIKHOAN = '$username' and MATKHAU = '$password1' ";
																		$query = mysqli_query($conn,$sql);
																		$num_rows = mysqli_num_rows($query);
																		$data = mysqli_fetch_array($query);
																		if ($num_rows==0) {
																			echo "Tên đăng nhập hoặc mật khẩu không đúng !";
																		}else{
																			// Lấy ra thông tin người dùng và lưu vào session
																			/*while ($data = mysqli_fetch_array($query)) {
																			$_SESSION["user_id"] = $data["id"];
																				$_SESSION['username'] = $data["username"];
																				$_SESSION["email"] = $data["email"];
																				$_SESSION["fullname"] = $data["fullname"];
																				$_SESSION["is_block"] = $data["is_block"];
																				$_SESSION["permision"] = $data["permision"];
																		}*/
																			$_SESSION['ID'] = $data["ID"];
																				$_SESSION['TENTAIKHOAN'] = $data["TENTAIKHOAN"];
																				
																				$_SESSION["QUYEN"] = $data["QUYEN"];
						if($data["QUYEN"]==3)
						header('Location: ../lecturers/lecturers.php');
						else if($data["QUYEN"]==1)
						header('Location: ../admin/admin.php');
						else if($data["QUYEN"]==2)
						header('Location: ../manager/manager.php');
						else
						header('Location: login_admin.php');
																// Thực thi hành động sau khi lưu thông tin vào session
																// ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
																			//header('Location: admin/admin.php');
																		}
																	}
																}
						?>

					</form>
				</div>
			</div>
		</div>
		
		<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>
	</body>
</html>