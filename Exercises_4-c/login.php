<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE  email = '$usernameemail'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $verify = password_verify($password, $row['password']);
        if ($verify == 1) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: index.php");
        } else {
            header("location: error.php");
            
        }
    } else {
        header("location: error1.php");
        
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="stylee.css">
  </head>
  <body class="body" >
    <div class="container">
      <div class="offset-md-4 col-md-4">

      
    
    
    <form class="" action="" method="post" >
    <h2>Login</h2>
    <div class="form_group" >
      <label for="usernameemail"><b> Email <b> </label>
      <input type="text" name="usernameemail" placeholder="Email" class="form-control" required value=""> 
    </div>
      <div class="form_group" >
      <label for="password"><b>Password <b> </label>
      <input type="password" name="password" placeholder="Password" class="form-control" required value="">
</div>
<div class="form-group my-2">
      <button type="submit" class=" form-control btn btn-success" name="submit"><b>Login</b></button> 
    </div>
<div class="regs" > Create a Account  ??
  <span id="regbtn"><a id="rgcolor" href="registration.php">Registration</a></span>
</div>
      
    </form>
    <br>
    
    </div>
    </div>
  </body>
</html>
