<?php

    require("pics/PHPMailer/PHPMailerAutoload.php");
    require("fconfig.php");

        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the server
        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port

        $mail->Username   = "gregcs50bras@gmail.com";   // GMAIL username
        $mail->Password   = "Drthun999";
        
        $mail->SetFrom("gregcs50bras@gmail.com");
        
        $mail->AddAddress($_POST["email"]);
        
        $mail->Subject = "Pictures up and ready!";
        
        $mail->Body = "Hi " . $_POST["username"] . "! \n\n Click the following link to access your pictures:\n\n final/clientlog.php \n\n Your login name will be this email address and the password will be your last name.";
        
        if($mail->Send() == false)
        {
            die($mail->ErrInfo);
        }
        else
        {
            echo "client notified!";
            redirect("/alertsuc.php");
        }
?>
