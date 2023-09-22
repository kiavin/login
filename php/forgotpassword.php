<?php
include 'database.php';
include 'config.php';

//details from the form
//set method to post
$email = $_POST['email'];

//check if email exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    //email exists
    //generate OTP
    $otp = rand(100000, 999999);
    $otp = md5($otp);
    //save OTP in the database
    $sql = "UPDATE users SET reset_token = '$otp' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    //set otp expire time
    $expires = date("Y-m-d H:i:s", strtotime("+10 minutes"));
    $sql = "UPDATE users SET reset_token_expiration = '$expires' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    //send email
    $to = $email;
    $subject = "Password Reset";
    $message = "Your OTP is: $otp";
    $headers = "from:kelvin";
    if(mail($to, $subject, $message, $headers)){
        echo "success otp has been sent to your email";
    }else{ 
        echo "failed to send otp";
    };
}else{
    echo "email not found";
}





?>