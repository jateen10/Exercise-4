<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOME page</title>
  <link rel="stylesheet" href="stylee.css">

  </head>

  <body class="wel_imge">
  <img src="wel.jpg">
  <header>
  <div class="login_btn" >
    <a id="logout" href="logout.php">Logout</a>
  </div>
</header>

    <div class="welcome">
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    
</div>
  </body>
</html>
