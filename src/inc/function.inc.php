<?php

// Mail 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require_once "../../vendor/autoload.php";
function mailUsing($to,$toName,$otp)
{
    include '../protected.php';

    $mail = new PHPMailer(true);

    //Enable SMTP debugging.
    $mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = $myEmail;
    $mail->Password = $myPass;
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to
    $mail->Port = 587;

    $mail->From = $myEmail;
    $mail->FromName = "Job Site";

    $mail->addAddress($to, $toName);

    $mail->isHTML(true);

    $mail->Subject = "OTP Varification";
    $mail->Body = "<i>Your otp for JOB SITE is <b>$otp</b></i>";

    $mail->send();
    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}


//Redirect 
function redirect($url){
    ?>
        <script>
            window.location.href = '<?php echo $url ?>';
        </script>
    <?php
}


//is valid recruiter
//it will take recruiter id and a url(is recruiter not valid this function will redirect him to the url )
function isValidRecruiter($con,$id, $url){
    $validSQL = "select * from recruiter where id=$id";
    $validQuery = mysqli_query($con, $validSQL);
    if(mysqli_num_rows($validQuery)<1){
        redirect($url);
    }
}



?>