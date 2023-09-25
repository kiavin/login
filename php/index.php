<?php
include 'database.php';
require_once 'config.php';
$db = Database_conn::getInstance();
$conn = $db->getConnection();



/*$username = $_POST['name'];
$password = $_POST['pass'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$re_pass = $_POST['re_pass'];*/
$username = "kelvin";
$password = "123456";
$email = "kelvin@gmail.com";
$mobile = "123456";



$database = new Database();

$database->query('select * from users where email = :email');
$database->bind(':email', $email);
$database->execute();

$result = $database->rowCount();

if ($result) {
    $message = "An account with that email already exists";
} else {
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
    <div id="errorText" style="color: rgb(245, 17, 17); background-color:aliceblue;"></div>

    <script>
        var message = "<?php echo $message; ?>";
        if (message !== "") {
            alert(message);
        }
    </script>
</body>

</html>