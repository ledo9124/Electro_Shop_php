<?php
session_start();

//dang ky
function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO `taikhoan` ( `email`, `user`, `pass`) VALUES ( '$email', '$user','$pass'); ";
    pdo_execute($sql);
}

function dangnhap($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        $_SESSION['user'] = $user;
    } else {
        return "Thông tin tài khoản sai";
    }
}

function dangxuat()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
}

function loadall_client($user_name = '')
{
    $sql = "select * from client where 1";
    if ($user_name != '') {
        $sql .= " and user_name like '%" . $user_name . "%'";
    }
    $sql .= " order by client_id asc";
    $listCategories = pdo_query($sql);
    return $listCategories;
}

function sendMail($email) {
    $sql="SELECT * FROM client WHERE client_email='$email'";
    $account = pdo_query_one($sql);

    if ($account != false) {
        sendMailPass($email, $account['user_name'], $account['password']);

        return "gui email thanh cong";
    } else {
        return "Email bạn nhập ko có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass) {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'leminhdo9124@gmail.com';                     //SMTP username
        $mail->Password   = 'ltvatmartwztcyng';                    //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('leminhdo9124@gmail.com', 'Electo Shop');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New password';
        $mail->Body    = 'Your new password is: ' .$pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>