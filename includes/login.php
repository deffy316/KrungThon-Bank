<?php 
    session_start();
    include('../includes/server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/style.css">
    
</head>
<body>
    <!--<div class="header">
        <h2>Login</h2> 

    </div>
    <form action="login_db.php" method="post">-->
        <?php include('../includes/errors.php'); ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class = "error" >
                <h3>
                    <?php 
                        
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>

            </div>
        <?php  endif ?>
        <!--<div class="input-group">
            <label for="ID_card_Number">ID Card Number</label>
            <input type="text" name="ID_card_Number">
        </div>
        <div class="input-group">
            <label for="password">password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <p>Not yet a member?<a href="register.php">Sign up</a></p>
    </form>-->
    


    <h2>Login</h2>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">
    <form class="modal-content animate" action="../handlers/login_db.php" method="post">
        <?php include('../includes/errors.php'); ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class = "error" >
                <h3>
                    <?php 
                        
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>

            </div>
        <?php  endif ?>
        
        <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        

        <div class="container">
        <label for="ID_card_Number"><b>ID Card Number</b></label>
        <input type="text" placeholder="Enter ID Card Number" name="ID_card_Number" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        
        <button type="submit" name="login_user">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="password"> Not yet a member? <a href="../public/register.php">Sign up</a></span>
        </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>