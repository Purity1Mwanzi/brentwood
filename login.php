<?php 
// include('db_connect.php'); 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Brentwood Apartment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> <?php include('./header.php'); ?>
<?php 
// if (isset($_POST['login']))
// header("location:index.php?page=home");

// ?>

</head>
<body>
<style>
  body{
        background-image:url("house.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .header{
        width: 30%;
        margin: 50px auto 0px;
        color:rgb(12, 8, 8);
        background: #2f5766;
        text-align: center;
        border: 1px solid #2f5766;
        border-bottom: none;
        border-radius:10px 10px 0px 0px;
        padding: 20px;
    }
    form, .content{
        width: 30%;
        margin: 0px auto;
        padding: 20px;
        border: 1px solid #b0c4de;
        background: white;
        border-radius:10px 10px 0px 0px;

    }
    .input-group{
        margin: 10px 0px 10px 0px;
    
    }
    label{
        display: block;
        text-align: left;
        margin: 3px;
    }
    input{
        height: 30px;
        width: 93%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid gray;
    }
    .btn{
        padding: 10px;
        font-size: 15px;
        color: white;
        background: #2f5766;
        border: none;
        border-radius: 5px;
    }
    .error{
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        border-radius: 5px;
        text-align: left;
    }
  </style>
 
     <div class="header">
     <h2 style="color:white;">Login</h2>
</div>
<form method="post" id="new_login" action="new_login.php">
    
    <div class="input-group">
        <label> Username </label>
      <input type="text" name="username" id="username">
</div>

<div class="input-group">
        <label>Password</label>
      <input type="password" name="password" id="password">
</div>

<div class="input-group">
        <button type="submit" name="login"class="btn">Login</button>
</div>
<p>
        Not a member? <a href="registration.php">Sign up</a>
</p>
</form>
</body>
<script>
    $(document).ready(function () {
        
        $("#new_login").submit(function (event) {
          event.preventDefault();
            var formData = {
                username: $("#username").val(),
                password: $("#password").val(),
               
            };


            $.ajax({
                type: "POST",
                url: "new_login.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
               console.log(data)
                if(data.status === 'success'){
                    if(data.user_type === '2'){

                        window.location.href = 'index.php?page=invoices'
                    }

                    else {

                        window.location.href = 'index.php'
                    }
                   
                    window.localStorage.setItem("user-type",JSON.stringify(data));
                }
            });

           
        });
    });

</script>
</html>