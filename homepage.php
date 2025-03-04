<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    
<!--อันใหม่-->
	<head>
		<title>Web Banking</title>
		<link rel= "stylesheet" href="style.css">
    </head>
	<body>
        
        <div class="navbar">
            <?php
            if(isset($_SESSION['ID_card_Number'])){
                // Login 
                echo '<a class="w" style="float:right; color:white; weight:15px;" href="user_info.php">Welcome ' .$_SESSION['ID_card_Number'].'</a>';
                echo '<a class="w" style="float:right; color:red;" href="logout.php">LOGOUT</a>';
                echo ''.$_SESSION['user_ID'];
            }else{
                // not Login
                echo '<!--ปุ่ม login-->
                <button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto; float:right;">Login</button>
    
                <div id="id01" class="modal">
                <form class="modal-content animate" action="login_db.php" method="post">
           
                    <div class="imgcontainer">
                    <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
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
                <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                <span class="password">Not yet a member? <a href="register.php">Sign up</a></span>
                </div>
                </form>
                </div>
    
                <script>
                // Get the modal
                var modal = document.getElementById(\'id01\');
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                if (event.target == modal) {
                modal.style.display = "none";
                }
                }
                </script>';
            }
            ?>
            <a class="w brand" href="homepage.php">KrungThon</a>
            <div class="dropdown">
            <!--<a class="menu-item" >Services</a>-->
            <button class="dropbtn">Services 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a class="w" href="txSelect.php">Transaction</a>
                <a class="w" href="apply_account.php">Open Account</a>
                <a class="w" href="Card_apply_form_final.php">Card Apply</a>
                <a class="w" href="Insurance_apply_form_final.php">Insurance Apply</a>
            </div>
            </div>
            <!-- <a class="w" href="#">About</a> -->
            <div class="dropdown">
            <button class="dropbtn">About 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a class="w" href="Branch_info.php">Branch</a>
            </div>
            </div>
    
        </div> 

        <div class="main">
            <div class="box">
                <img class="image-homepage" src="picture/card.jpg">
                <h2 class="text">Card information</h2>
                <a class="button-read" href="Card_info.php">Read more</a>
             </div>
        </div>
        <div class="main">
            <div class="box">
                <img class="image-homepage" src="picture/insurance.jpg">
                <h2 class="text">Insurance information</h2>
                <a class="button-read" href="Insurance_info.php">Read more</a>
             </div>
        </div>
        <footer class="bottom-footer">
            <p>Contact</p></p>
            <p>Copyright 2023</p>
        </footer>
    
    </body>
</html>