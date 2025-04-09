<?php 
    include('../includes/config.php');
    include('../includes/navbar.php');
    
?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Web Banking</title>
    <link rel= "stylesheet" href="../assets/style.css">
</head>
<body>
    <!-- Login Modal -->
    <div id="id01" class="modal">
        <form class="modal-content animate" action="../handlers/login_db.php" method="post">
            <div class="imgcontainer">
                <span onclick="closeLoginModal()" class="close" title="Close Modal">&times;</span>
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
                <button type="button" onclick="closeLoginModal()" class="cancelbtn">Cancel</button>
                <span class="password">Not yet a member? <a href="../public/register.php">Sign up</a></span>
            </div>
        </form>
    </div>

    <div class="main">
        <div class="box">
            <img class="image-homepage" src="../picture/card.jpg">
            <h2 class="text">Card information</h2>
            <a class="button-read" href="../public/Card_info.php">Read more</a>
        </div>
    </div>
    <div class="main">
        <div class="box">
            <img class="image-homepage" src="../picture/insurance.jpg">
            <h2 class="text">Insurance information</h2>
            <a class="button-read" href="../public/Insurance_info.php">Read more</a>
        </div>
    </div>
    <footer class="bottom-footer">
        <p>Contact</p>
        <p>Copyright 2023</p>
    </footer>
</body>
</html>
