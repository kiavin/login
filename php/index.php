<?php
include 'database.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "kevoh");
define("DB_NAME", "backbone");


$username = $_POST['name'];
$password = $_POST['pass'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$re_pass = $_POST['re_pass'];


$database = new Database();

$database->query('select * from users where email = :email');
$database->bind(':email', $email);
$database->execute();

$result = $database->rowCount();

if($result ){
    $message = "An account with that email already exists";
}else{
    $database->query('INSERT INTO users (username, password, email, mobile) VALUES (:username, :password, :email, :mobile)');

$database->bind(':username', $username);
$database->bind(':password', $password);
$database->bind(':email', $email);
$database->bind(':mobile', $mobile);

$database->execute();
$message = "You have been registered successfully";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head>
<body>
<h1><?php echo $message; ?></h1>
</body>
</html>
