<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.0.6/src/Exception.php';
require 'PHPMailer-6.0.6/src/PHPMailer.php';
require 'PHPMailer-6.0.6/src/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$comment = $_POST["comment"];

$toAddress = "ryandupay@gmail.com"; //To whom you are sending the mail.
$message   = <<<EOT
    <html>
       <body>
          <h>You got an Email from your Personal Website</h>
          <p>From: $name</p>
          <p>Message: $comment</p>
          <p></p>
       </body>
    </html>
EOT;

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth    = true;
$mail->Host        = "smtp.gmail.com";
$mail->Port        = 587;
$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->IsHTML(true);
$mail->Username = "ryandupay@gmail.com"; // your gmail address
$mail->Password = "Op+!on@l1"; // password
$mail->SetFrom("ryandupay@gmail.com");
$mail->Subject = "You got mail! - From Personal Web"; // Mail subject
$mail->Body    = $message;
$mail->AddAddress($toAddress);
if (!$mail->Send()) {
    echo "Failed to send mail";
    
} else {
    echo "Mail sent succesfully";
}

?>