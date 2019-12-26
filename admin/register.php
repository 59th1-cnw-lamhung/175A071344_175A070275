<?php
//register.php

include('../includes/connection.php');

if(isset($_SESSION['ID']))
{
	header("location:index.php");
}

$message = '';

if(isset($_POST["register"]))
{
	$query = "SELECT * FROM taikhoan WHERE EMAIL = :EMAIL";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':EMAIL'	=>	$_POST['user_email']
		)
	);
	$no_of_row = $statement->rowCount();
	if($no_of_row > 0)
	{
		$message = '<label class="text-danger">EMAIL ĐÃ THOÁT</label>';
	}
	else
	{
		$MATKHAU = rand(100000,999999);
		$MATKHAUMAHOA = md5($MATKHAU);
		$MAKICHHOAT = md5(rand());
		$insert_query = "
		INSERT INTO taikhoan 
		(ID, TENTAIKHOAN, MATKHAU, EMAIL, MAKICHHOAT, QUYEN, TRANGTHAI) 
		VALUES (:ID, :TENTAIKHOAN, :MATKHAU, :EMAIL, :MAKICHHOAT, :QUYEN, :TRANGTHAI)
		";

		$statement = $connect->prepare($insert_query);
		$statement->execute(
			array(
				':ID'               =>	$_POST['id'],
				':TENTAIKHOAN'		=>	$_POST['user_name'],
				':MATKHAU'		    =>	$MATKHAUMAHOA,
				':EMAIL'			=>	$_POST['user_email'],
				':MAKICHHOAT'	    =>	$MAKICHHOAT,
				':QUYEN'			=>	$_POST['user_level'],
				':TRANGTHAI'	    =>	'CHUAXACMINH'
			)
		);
		$result = $statement->fetchAll();


        
		

       if($_POST['user_level'] =="2")
        {
            $insert_query1 = "INSERT INTO quanly(MAQUANLY, TEN, DIACHI, SDT) VALUES (:MAQUANLY, :TEN, :DIACHI, :SDT)";
            $statement1 = $connect->prepare($insert_query1);
		    $statement1->execute(
			array(
				':MAQUANLY'  =>	$_POST['id'],
				':TEN'		=>	$_POST['name'],
				':DIACHI'	=>	$_POST['address'],
				':SDT'		=>	$_POST['phone']
				
			)
		);
		$result1 = $statement1->fetchAll();


        }

        else if($_POST['user_level'] =="3")
        {
            $insert_query2 = "INSERT INTO giangvien(MAGIANGVIEN, TEN, DIACHI, SDT) VALUES (:MAGIANGVIEN, :TEN, :DIACHI, :SDT)";
            $statement2 = $connect->prepare($insert_query2);

		    $statement2->execute(
			array(
				':MAGIANGVIEN'  =>	$_POST['id'],
				':TEN'		=>	$_POST['name'],
				':DIACHI'	=>	$_POST['address'],
				':SDT'		=>	$_POST['phone']
				
			)
        );
		$result2 = $statement2->fetchAll();
		

        }


		if(isset($result))
		{
			$base_url = "http://localhost/175A070275_175A071344/BTL_CNW_VIETCAO/";  //change this baseurl value as per your file path
			$mail_body = "
			<p>Chào ".$_POST['user_name'].",</p>
			<p>Cảm ơn! Mật khẩu của bạn là ".$MATKHAU.". Mật khẩu này sẽ chỉ hoạt động sau khi xác minh email của bạn.</p>
			<p>Vui lòng mở liên kết này để xác minh địa chỉ email của bạn - ".$base_url."admin/email_verification.php?activation_code=".$MAKICHHOAT."
			<p>Thân,<br />VietCao</p>
			";
			require 'class/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
			$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '465';								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = 'hungnguyen14599@gmail.com';					//Sets SMTP username
			$mail->Password = 'okrbugbmordrppas';					//Sets SMTP password
			$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'info@hungvietcao.info';			//Sets the From email address for the message
			$mail->FromName = 'VietCao';					//Sets the From name of the message
			$mail->AddAddress($_POST['user_email'], $_POST['user_name']);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Email Verification';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Đăng ký xong, yêu cầu người dùng kiểm tra thư của họ.</label>';
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container" style="width:100%; max-width:600px">
			
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Tạo tài khoản</h4></div>
				<div class="panel-body" style="margin-left: -15px;">
					<form method="post" id="register_form">
						

						<div class="form-row">
							<div class="form-group col-md-3" >
								<label>Id</label>
								<input type="number" name="id" class="form-control" required />
							</div>
							<div class="form-group col-md-9">
								<label>Tên tài khoản</label>
								<input type="text" name="user_name" class="form-control" pattern="[a-zA-Z ]+" required style="margin-left: -18px;"/>
							</div>
					    </div>

					    <div class="form-row">
							<div class="form-group col-md-6">
								<label>Email</label>
								<input type="email" name="user_email" class="form-control" required />
							</div>


							<div class="form-group col-md-6">
								<label>Họ và tên</label>
								<input type="text" name="name" class="form-control" required style="margin-left: -18px;"/>
							</div>
                        </div>
						<div class="form-group col-md-12">
							<label>Địa chỉ</label>
							<input type="text" name="address" class="form-control" required />
						</div>

						<div class="form-group col-md-12">
							<label>Số điện thoại</label>
							<input type="text" name="phone" class="form-control" required />
						</div>


						<div class="form-row">
							<div class="form-group col-md-4" >
		                        <label>Quyền truy cập</label>
		                        
		                        
		                        <select name="user_level" class="form-control" class="form-group">
		                            <option></option>
		                            <option value="2">Quản lý</option>
		                            <option value="3">Giảng viên</option>
		                        </select>
		                    </div>

		                    <div class="form-group" >

									<input type="submit" name="register" id="register" value="Tạo tài khoản" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>
							<?php echo $message; ?>
					    </div>
                                            
					</form>
				</div>
			</div>
		</div>
	</body>
</html>