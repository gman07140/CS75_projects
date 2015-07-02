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
        
        $mail->SetFrom($_POST["email"]);
        
        $mail->AddAddress("gregcs50bras@gmail.com");
        
        $mail->Subject = "Picture Request";
        
        $mail->Body = "To whom it may concern: \n\n\n" . $_POST["username"] . " (id " . $_POST["userID"] . ") would like the following pictures to be printed
                      \n" . $_POST["pics"] . "\n\n\nSpecial requests (if any) will be listed below: \n\n" . $_POST["requests"];
        
        if($mail->Send() == false)
        {
            echo "email failed due to " . $mail->ErrInfo . "";
            die($mail->ErrInfo);
        }
        else
        {
            echo "request submitted!";
        }
?>