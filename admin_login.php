<?php 
include '../components/connect.php';
session_start();

if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $name = filter_var($name, FILTER_SANITIZE_STRING);

     $pass = sha1($_POST['password']);
     $pass = filter_var($pass, FILTER_SANITIZE_STRING);

      $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name =? AND password =?");
      $select_admin->execute([$name, $pass]);

      if($select_admin->rowCount() > 0){
        $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
        $_SESSION['admin_id'] = $fetch_admin_id['id'];
        header('location:admin_dashboard.php');
      }
      else{
        $message[] = 'incorrect username or password';
      }
}
?>
<style>
    <?php  include 'admin_style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="padding-left: 0 !important;">
    <?php
   if(isset($message)){
    foreach($message as $msg){
        echo '
            <div class="message">
                <span>'.$msg.'</span>
                <i class="fa-solid fa-circle-xmark" onclick="this.parentElement.remove();"></i>
             </div>
        ';
    }
}
?>
<section class="form-container" id="admin_login">
       <form action="" method="post">
            <h3>Login now</h3>
            <div class="input-field">
                <label for="">user name <sup>*</sup></label>
                <input type="text" name="name" maxlength="20" required placeholder = "enter your username" oninput ="this.value.replace(/\s/g, '')">
            </div>
            <div class="input-field">
                <label for="">Password <sup>*</sup></label>
                <input type="password" name="password" maxlength="20" required placeholder = "enter your password" oninput ="this.value.replace(/\s/g,'')">
            </div>
            <input type="submit" name="submit" value="login now" class="btn">
       </form>
</section>
</body>
</html>