<?php
include 'database.php';
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "kevoh");
define("DB_NAME", "backbone");


$username = $_POST['name'];
$password = $_POST['pass'];
$invalid = 0;
$login = 1;


$database = new Database();

$database->query('select * from users where username = :username AND password = :password');
$database->bind(':username', $username);
$database->bind(':password', $password);
$database->execute();

$result = $database->rowCount();

if ($result) {
    $message = "You have been logged in successfully";
    //echo "You have been logged in successfully";
    $login = 0;
} else {
    $message = "Invalid username or password";
    //echo "Invalid username or password";
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
<h1><?php echo $message; ?></h1>
<a href="/var/www/html/kevoh.com/SingUp.html">go to homepage</a>
</body>
</html>