<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brentwood";

$errors = array();


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
//ensure that the forms are filled properly
if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}
if (count($errors) ==0) {
    $query = "SELECT * FROM users WHERE user_name='$username'";

    $result = mysqli_query($conn, $query);

    $hashed_password ='';
    while ($row = $result->fetch_assoc()) {
        $hashed_password = $row['password'];
    }


     if(password_verify($password, $hashed_password)){
         $result = mysqli_query($conn, $query);

         $usertype = '';
         $user_id= '';
         global $tenantid;
         while ($row = $result->fetch_assoc()) {
            
             $tenantid = $row['tenant_id'];
             $_SESSION['tenant_id'] = $row['tenant_id'];
             
             $usertype = $row['user_type'];
             $user_id=$row['id'];
         }

         $_SESSION['ut']= $usertype;
         
         echo json_encode([
            "status"=>'success',
            "user_type"=>$usertype,
            "user_id"=>$user_id
         ]);
         //header('location: index.php'); //redirect to home page
     }

}

else
    {


        array_push($errors,"Wrong username/password combination");


        //    header('location: login.php');
    }


// if (mysqli_query($conn, $sql)) {

//     $_SESSION['user_type'] = $usertype;
 // header('location: login.php'); //redirect to home page

// } else {
//     echo json_encode(mysqli_error($conn));
// }

// mysqli_close($conn);
