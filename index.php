<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
    <link   href = "./index.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body class=" bg-info bg-gradient bg-opacity-25"  >
<div class="d-flex justify-content-center align-items-center vh-100 mw-100  " >
  <form class = "d-flex flex-column p-4 bg-black text-white border rounded mh-100" action="" method = "POST" >
  <h1 class="mb-3 fs-1">Contact form</h1>
    <div class="mb-3">
      <label for="inputEmail4" class="form-label"  >Enter Name</label>
      <input type="text" class="form-control" id="inputText4 " name ="name">
    </div>
    <div class="mb-3">
      <label for="inputPassword4" class="form-label"  >Enter Email</label>
      <input type="email" class="form-control" id="inputPassword4" name = "email">
    </div>
    <div class="form-floating mb-3">
    <textarea class="form-control"id="floatingTextarea"  name = "msg"></textarea>
    <label for = "floatingTextarea"  >Enter Your Message</label>
    </div>
    <div class="mt-auto text-center">
      <button type="submit" class="btn btn-primary w-100 py-2" name = "send"  >Send</button>
    </div>
  </form> 
</div>

</body>
<?php
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  if(isset($_POST['send'])){
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
  }


//Load Composer's autoloader
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('');
    $mail->addAddress('');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test Contact Form';
    $mail->Body    = "Sender Name - $name  <br> Sender Email - $email <br> Message - $msg ";


     $mail->send();
     echo  "<div class = 'success' > Message has been sent! </div>" ;
} catch (Exception $e) {
    echo " <div class = 'alert'> Message could not be sent. </div>";
}
?>
