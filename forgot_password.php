<?php 
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once './public/phpmailer/src/Exception.php';
    require_once './public/phpmailer/src/PHPMailer.php';
    require_once './public/phpmailer/src/SMTP.php';

    if(isset($_POST["forgot_pass"])) {
        
        $mail = new PHPMailer(true);
        $userModel = new User();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'toilanhen24@gmail.com'; //Email name
        $mail->Password = 'itge xmzr tfid lwoc'; //Mail app password;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';

        $mail->setFrom('toilanhen24@gmail.com');

        $mail->addAddress($_POST['email']);

        $mail->isHTML(true);

        $phone = $_POST['phone'];
        $otp = "";
        for ($i=0; $i < 5; $i++) { 
            $otp = $otp.random_int(1,9);
        }
        $text = "
        Hi,
        
        There was a request to change your password!
        
        If you did not make this request then please ignore this email.
        
        Otherwise, please click this link to change your password: ";
        $mail->Subject = "Get password from ARO STORE";
        $mail->Body = $text.$otp;

        $mail->send();
        
        $userModel->updatePassword($phone, $_POST['email'], $otp);
        
        echo "
        <script>
        alert('Send email success!');
        document.location.href = 'index.php';
        </script>   
        ";

    }
?>

