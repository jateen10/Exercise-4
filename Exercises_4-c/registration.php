<?php


require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $h_password = password_hash($password,PASSWORD_DEFAULT);
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE   email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert(' Email Has Already exist'); </script>";
  }
  
  else{
    if($password == $confirmpassword){
     $hash = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$h_password')";
      mysqli_query($conn, $query);
   
      echo "Registration Successful  !!";
     
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registraction page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="stylee.css">
</head>
  <body class="body">

    <div class="container">
      <div class="offset-md-4 col-md-4" >


  
    <form class="" action="" method="post" autocomplete="off">
    <h2>Registration</h2>
    <div class="form_group" >
         <label for="name"><b>Name </b> </label>
         <input type="text" name="name" placeholder="Name" class="form-control" required value=""> 
    </div>
    <div class="form_group" >
      <label for="username"> <b> Username</b>  </label>
      <input type="text" name="username" placeholder="Username" class="form-control" id = "username" required value=""> 
      </div>
    <div class="form_group" >
      <label for="email"> <b> Email </b> </label>
      <input type="email" name="email" placeholder="Email" class="form-control" id = "email" required value=""> 
    </div>
    <div class="form_group" >
      <label for="password"><b> Password </b> </label>
      <input type="password" name="password" placeholder="Password" minlength="6"
       class="form-control"  id = "password" required value=""> 
    </div>

      <div class="form_group" >
      <label for="confirmpassword"><b> Confirm Password </b> </label>
      <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control"  id = "confirmpassword" required value=""> 
      </div>
      <div class="form-group my-2">
      <button type="submit" class=" form-control btn btn-success" name="submit"><b> Register</b>
      </button> </div>
      
      <div class="form-group my-2" >
        <span class=" form-control btn btn-success "> <a id="text" href="login.php"><b>Login</b>
        </a>
      </span></div>
    </form>
    
    
    
    </div>
    </div>
  </body>
</html>
