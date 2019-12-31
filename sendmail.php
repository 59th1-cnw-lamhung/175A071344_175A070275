
<?php
header('Content-Type: text/html; charset=UTF-8');  
date_default_timezone_set('Asia/Bangkok');

require_once 'PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer;


$mail->isSMTP();


$mail->SMTPDebug =0;


$mail->Debugoutput = 'html';


$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;


$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;


$mail->Username = "hungnguyen14599@gmail.com";


$mail->Password = "okrbugbmordrppas";


$mail->setFrom('hungnguyen14599@gmail.com', 'register');


$mail->addReplyTo('hungnguyen14599@gmail.com', 'Feedback');


$mail->addAddress($EMAIL, '');


$mail->Subject = 'THONG TIN TAI KHOAN';


$mail->msgHTML($mail_body);


/*if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "";

}*/

if($mail->Send())								//Send an Email. Return true on success or false on error
{
	$message = "<script>alert('Tạo tài khoản thành công, yêu cầu người dùng kiểm tra email!'); window.location='upload1.php'</script>";

}
			

?>