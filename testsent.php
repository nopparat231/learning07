<?php
    $from = "test@test.com";
    $to = "23.noop@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine <br>";
    $headers = "From:" . $from;
    $send = mail($to,$subject,$message, $headers);
    if (!$send) {
    	echo "Error.";
    }else{
    	echo "The email message was sent.";
    }
    
?>