<?php 
     include '../components/connect.php';
     session_start();

     $admin_id = $_SESSION['admin_id'];
     if(!isset($admin_id)){
        header('location: admin_login.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php include '../components/admin_header.php'; ?>
</body>
</html>