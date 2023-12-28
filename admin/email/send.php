<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../../public/phpmailer/src/Exception.php';
    require_once '../../public/phpmailer/src/PHPMailer.php';
    require_once '../../public/phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        $mail = new PHPMailer(true);

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

        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];

        $mail->send();

        echo "
        <script>
        alert('Send email success!');
        document.location.href = 'email.php';
        </script>   
        ";

    }
?>

