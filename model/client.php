<?php
session_start();

//dang ky
function insert_account($email, $user, $pass)
{
    $sql = "INSERT INTO `client` ( `client_email`, `user_name`, `password`) VALUES ( '$email', '$user','$pass'); ";
    pdo_execute($sql);
}

function signin($client_email, $pass , $remember = false)
{
    $sql = "SELECT * FROM client WHERE client_email='$client_email' and password='$pass'";
    $account = pdo_query_one($sql);

    if ($account != false) {
        $_SESSION['account'] = $client_email;
        return 'Logged in successfully!';
    }else {
        return 'Account or password is incorrect!';
    }
}

function logout()
{
    if (isset($_SESSION['account'])) {
        unset($_SESSION['account']);
    }
}

function loadall_client($user_name = '',$client_email='' , $client_role = false)
{
    $sql = "select * from client where 1";
    if ($user_name != '') {
        $sql .= " and user_name like '%" . $user_name . "%'";
    }
    if ($client_email != '') {
        $sql .= " and client_email = '" . $client_email . "'";
    }
    if ($client_role) {
        $sql .= " and client_role = 0";
    }
    $sql .= " order by client_id asc";
    $listClients = pdo_query($sql);
    return $listClients;
}


function hard_delete_client($id)
{
    $sql = "DELETE FROM client WHERE client_id=" . $id;
    pdo_execute($sql);
}

function sendMail($email) {
    $sql="SELECT * FROM client WHERE client_email='$email'";
    $account = pdo_query_one($sql);

    if ($account != false) {
        sendMailPass($email, $account['user_name'], $account['password']);

        return true;
    } else {
        return false;
    }
}

function sendMailPass($email, $username, $pass) {
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'leminhdo9124@gmail.com';                     //SMTP username
        $mail->Password   = 'ijjjajazugceowli';                    //SMTP password
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