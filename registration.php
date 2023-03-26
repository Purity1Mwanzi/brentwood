<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="  crossorigin="anonymous"></script>
    <title>Brentwood Apartment</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
    <h2 style="color:white;">Register</h2>
</div>
<form id="new-registration" method="post" action="new_registration.php">
    <!-- display validation errors here -->
    <?php?>
    <div class="input-group">
        <label> Username </label>
        <input type="text" id="username" name="username" value="<?php ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="text" id="email" name="email" value="<?php ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" id="confirm_password" name="password_w">
    </div>
    <div class="input-group">
        <label>User Type</label>
        <select name="user_type" id="user_type">
            <option value="1">Landlord</option>
            <option value="2">Tenant</option>
        </select>
    </div>
    <div class="input-group">
        <button type="submit" name="register"class="btn">Register</button>
    </div>
    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
</body>
<script>
    $(document).ready(function () {
        $("#new-registration").submit(function (event) {
          event.preventDefault();
          var re = /\S+@\S+\.\S+/;
          if( $("#username").val()===''){
            swal('username field is empty')

          }
      else if($("#email").val()===''){
        swal('email field is empty')
      }
      else if($("#password").val()!=$('#confirm_password').val()){
        swal('password do not match')
      }
      else if(!re.test($("#email").val())){
        swal('email is invalid')
        
  
}
      
      else {
        var formData = {
                username: $("#username").val(),
                email: $("#email").val(),
                user_type: $("#user_type").val(),
                password:$("#password").val(),
              
            };

            $.ajax({
                type: "POST",
                url: "new_registration.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                
                
                if(data === "success"){
                  
                    window.location.href = "login.php"
                }
                else{

                    swal('LandLord Already Exists')
                }
            });
      }

      

           
        });
    });

</script>
</html>
