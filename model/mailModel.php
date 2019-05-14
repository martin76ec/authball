<?php

    include_once "vendor/autoload.php";
    include_once "controller/routeController.php";

    function sendMail($user_name, $mail, $correct_ball, $correct_goal){
        $text = "!Hola!\n$user_name\n";
        $html = "<html>
            <head></head>
            <body>
                <p>!Hola!<br>
                $user_name<br>
                </p>
                <p>La pelota a escoger es: $correct_ball</p>
            </body>
            </html>";
        // This is your From email address
        $from = array('grantzero1@gmail.com' => 'Authball');
        // Email recipients
        $to = array(
            $mail=>$user_name
        );
        // Email subject
        $subject = 'Respuesta de autenticación';
    
        // Login credentials
        $username = 'azure_f35493980781e3cb9752cdf90c140f45@azure.com';
        $password = 'authmail2019';
    
        // Setup Swift mailer parameters
        $transport = (new Swift_SmtpTransport('smtp.sendgrid.net', 587));
        $transport->setUsername($username);
        $transport->setPassword($password);
        $swift = new Swift_Mailer($transport);
    
        // Create a message (subject)
        $message = new Swift_Message($subject);
    
        // attach the body of the email
        $message->setFrom($from);
        $message->setBody($html, 'text/html');
        $message->setTo($to);
        $message->addPart($text, 'text/plain');
        $solve_img = "";
        if($correct_goal == "A"){
           $solve_img = "view/assets/solveA.png";
        } 

        if($correct_goal == "B"){
            $solve_img = "view/assets/solveB.png";
        } 

        if($correct_goal == "C"){
            $solve_img = "view/assets/solveC.png";
        } 

        $attachment = Swift_Attachment::fromPath($solve_img, 'image/png');
        $message->attach($attachment);
        // send message
        if ($recipients = $swift->send($message, $failures))
        {
            print "<script>alert('Se ha enviado un mensaje a su correo');</script>";
        }
        else
        {
            print "<script>alert('No es posible enviar un mensaje a su correo');</script>";
        }
    }