<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brentwood";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = mysqli_real_escape_string($conn, $_POST ['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$passwords = mysqli_real_escape_string($conn, $_POST['password']);
$usertype = mysqli_real_escape_string($conn,$_POST['user_type']);
$hashed_password = password_hash($passwords, PASSWORD_DEFAULT); // encrypt password before storing in database (security)


$sql = "INSERT INTO users (user_name, email, user_type, password) VALUES ('$username','$email',$usertype,'$hashed_password')";

if (mysqli_query($conn, $sql)) {
    
    echo json_encode('success');
    // header('location: login.php'); //redirect to home page
} else {
    echo json_encode(mysqli_error($conn));
}

mysqli_close($conn);

?>