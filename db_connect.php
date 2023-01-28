<?php

$username ="";
$email ="";
$errors = array();
//connect to the database
$db = mysqli_connect('localhost', 'root','','brentwood');
//if the registration button is clicked
if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    //ensure that the forms are filled properly
    if (empty($username)) {
        array_push($errors, "Username is required"); 
    }
    if (empty($email)) {
        array_push($errors, "Email is required"); 
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required"); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two password do not match");
    }

    //if there are no erros, save user to database
    if(count($errors) ==0){
        $password = md5($password_1); // encrypt password before storing in database (security)
        $query ="INSERT INTO users (user_name, email, password) 
                 VALUES ('$username','$email', '$password')";
        mysqli_query($db,$query);
        $_SESSION['username']=$username;
        $_SESSION['success']="You are now logged in";
        header('location: home.php'); //redirect to home page
    }
}    


//log user in from login page 
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);
    //ensure that the forms are filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) ==0){
        $password = md5($password); // encrypt password before comparing with that from database 
        $query= "SELECT * FROM users WHERE user_name='$username' AND password= '$password'";

        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)== 1){
            //check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin')
            {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']="You are now logged in";
                header('location: index.php'); //redirect to home page
            }else{

                array_push($errors,"Wrong username/password combination");
                header('location: login.php');
            }
        }
    }
//logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
}
?>