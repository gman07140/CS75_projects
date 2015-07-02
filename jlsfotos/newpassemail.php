<?php

    require("pics/PHPMailer/PHPMailerAutoload.php");
    require("fconfig.php");

        if (empty($_POST["email"]))
        {
            echo "**Please enter your email";
            exit();
        }

        //try to find email in database
        $numrows = query("SELECT userID, username, COUNT(email) AS CountofEmails FROM users WHERE email = ?", $_POST['email']);

        if ($numrows[0]["CountofEmails"] == 0)
        {
            echo "**Email does not exist.  Please contact administrator.";
            exit();
        }
        else
        {
            $id = $numrows[0]["userID"];
            $user = $numrows[0]["username"];
        
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
            
            $mail->Subject = "Password reset request";
            
            $mail->Body = "Hi " . $user . "! \n\n Click the following link to reset your password:\n\n http://192.168.0.22/newpass.php?action&userid=" . $id . "";
            
            if($mail->Send() == false)
            {
                echo "email failed due to " . $mail->ErrInfo . "";
                die($mail->ErrInfo);
            }
            else
            {
                echo "Email sent!";
            }
        }
?>
