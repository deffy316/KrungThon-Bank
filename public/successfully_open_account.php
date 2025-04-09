<?php 
   
    include('../includes/config.php');
    include('../includes/navbar.php');
    include('../includes/server.php');
    $query = 'select * from bank_account where user_ID = '.$_SESSION['user_ID'];
    
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User information</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <h1 class="userinfo-text">Your account successfully</h1>
    <div class="box1">
    <form action="../public/user_info.php">
	<div class="botton" align="center"><input name="INSERT" type="submit" id="INSERT" value="Go to user info" ></div>
	</form>  
    
    
    


</body>
</html>