<?php
include 'database.php';
include 'config.php';


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


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