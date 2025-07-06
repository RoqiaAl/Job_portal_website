<?php
require "../connection.php";
            if (isset($_POST["send"])) {
                $userName = $_POST["username"];
                $userEmail = $_POST["email"];
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $toEmail = "www.roqiaalialeliwi2020@gmail.com";
                $query=mysqli_query($con,"INSERT INTO `contact`( `username`, `email`, `subject`, `message`) VALUES ('$userName','$userEmail','$subject','$message')");
echo " inserted";
                $mailHeaders = "Name: " . $userName .
                    "\r\n Email: " . $userEmail  .
                    "\r\n subject: " . $subject  .
                    "\r\n Message: " . $message . "\r\n";

                if (mail($toEmail, $userName, $mailHeaders)) {
             echo       $message = "Your contact information is received successfully.";
                }
            }
            ?>