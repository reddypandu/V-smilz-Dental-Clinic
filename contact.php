<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "405 Method Not Allowed. This script only handles POST requests.";
    exit();
}

//get data from form  

$name = $_POST['Name'];
$email= $_POST['Email'];
$subject= $_POST['Subject'];
$number= $_POST['Number'];
$message= $_POST['Message'];

$to = "phanindragandikota2001@gmail.com";
$subject = "You Got the New Message!!";
$txt = "Name = ". $name . "\r\n  Email = " . $email . "\r\n Subject =" . $subject . "\r\n Number = " . $number . "\r\n Message = " . $message ;
$headers = "From: chandrakanthkokkiripati1998@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");
?>