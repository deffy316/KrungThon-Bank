<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta charset="TIS-620">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apply_account</title>
    <script>
            function gen(){
            return Math.floor(100000 + Math.random() * 9000000000);
        }
        let d = gen();
    </script>

    <link rel="stylesheet" href="style.css">
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

    
    <p class="tx">Open an Account</p> 
    
    <div class="main-form">
    <div class="form">
    <div class="box1">
    <div class = "date-account">
		<c>Date :</c>
			<script>
				date = new Date().toLocaleDateString();
				document.write(date);
			</script>
	</div>

        <div>
        <form action="apply_account_db.php" method="post">
        <input type="hidden" id="gen" name = "gen" value="">
        <?php include('errors.php'); ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class = "error" >
                <h3>
                    <?php 
                        
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3> 
        <?php  endif ?>
        </div>

        <div class="input-group">
            <label for="account_name" style="padding-top:20px;">Account name</label>
            <input type="text" name="account_name" style="background-color: #e3e0e0;">
        </div>

        <div>
            <label for="account_type">Account Type:</label>
            <select name="account_type" id="account_type">
                <option value="Saving account">Saving account</option>
                <option value="Current account">Current account</option>
                <option value="Salary account">Salary account</option>
                <option value="Fixed deposit account">Fixed deposit account</option>
                <option value="Recurring deposit account">Recurring deposit account</option>
            </select>
        </div><br>

        <div>
            <label for="branch_name">Branch:</label>
            <select name="branch_name" id="branch_name">
                <option value="CMU">Chiang Mai University</option>
                <option value="KMUTT">King Mongkut's University of Technology Thonburi</option>
                <option value="TU">Thammasat University</option>
                <option value="SWU">Srinakharinwirot University</option>
                
            </select>
        </div>
        <br><br>
        
        <div> 
            <button type="submit" name="apply_user" onclick="document.getElementById('gen').value = d">Submit</button>
        </div>
        
    </form>
        </div>
    </div>
    </div>
</body>
</html>