<?php session_start(); ?>
<?php include "includes/header.php" ?>
<?php
//Gọi file connection.php ở bài trước
require_once("includes/connection.php");
?>

<div class="main-body">
	<main>
		<table class="table-main">
			<tbody>
				<tr>
					<td valign="middle" align="center">
						<div class = "include-table">
							<div class="login-table">
								<table class="top-table">
									<tbody>
										<tr><td>
											
										</td></tr>
									</tbody>
								</table>
								<table class="middle-table">
									<tr><td valign="middle" align="center">
										<form action="login.php" method="post">
											<table class="middle-table-center">
												<tbody>
													<tr>
														<td class="info" align="right" >Tài khoản: &nbsp;</td>
														<td>
															<input type="text" name="username">
														</td>
													</tr>
													<tr>
														<td class="info" align="right">Mật khẩu: &nbsp;</td>
														<td>
															<input type="password" name="password">
														</td>
													</tr>
													<tr>
														
														<td class="info">
															<input type="submit" name="btn_submit" value="Đăng nhập">
														</td>

														<td class="info">
															<button><a href="index.php" style="text-decoration: none">Về trang chủ</a></button>
														</td>
														
														<?php
														// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
															if (isset($_POST["btn_submit"])) {
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
														header('Location: lecturers/lecturers.php');
														else if($data["QUYEN"]==1)
														header('Location: admin/admin.php');
														else if($data["QUYEN"]==2)
														header('Location: manager/manager.php');
														else
														header('Location: index.php');
															// Thực thi hành động sau khi lưu thông tin vào session
															// ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
																		//header('Location: admin/admin.php');
																	}
																}
															}
														?>
														
													</tr>
													<tr>
														<td class="info" colspan="2" align="center">
															<a href="">[ Quên mật khẩu ]</a>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										
									</td></tr>
								</table>
								<table class="bottom-table">
									<tbody>
										<tr><td>
											
										</td></tr>
									</tbody>
								</table>
							</table>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</main>
</div>
<?php include "includes/footer.php" ?>