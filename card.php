<?php
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', 1);
            error_reporting(-1);
            session_start();
            $con=mysqli_connect("35.240.246.187","root","25452545","bankdb");
            // Check connaection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
?>
<html>
    <head>
        <meta charset="utf-8">
		<meta charset="TIS-620">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
        <title>Card payment</title>
        <link rel= "stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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

        
        <p class="tx">Card payment</p>
        
        <form action="card_handle.php" method="get">
        <div class="main-form">
        <div class="form">
        <div class="text1">Transferor information</div>
        <div class="main1">
            <div class="box1">   
                <p class="form-text1">Account :
                    <select name="acctNumTf" id="bankAcct" required>
                    <!-- echo query result -->
                    <?php
                    $sql = 'select * from bank_account where user_id = '.$_SESSION['user_ID'];
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo '<option value='.$row['account_number'].'>'.$row['account_name'].': '.$row['account_number'].'.Balance:'.$row['account_balance'].'</option>';
                        }
                    }else{
                        echo '<option value=NoAcct>You need account to make a transaction</option>';
                    }
                    ?>
                    </select>
                </p>
            </div> 
        </div>   

        <div class="text1">Card information</div>
        <div class="main1">
            <div class="box1">
                <p class="form-text1">Card number : <input type="text" name="cardNum" style="background-color: #e3e0e0; "></p>
            </div>
        </div>

        <div class="text1">Payment detail</div>
        <div class="main1">
            <div class="box1">
                <p class="form-text1">Payment amount : <input type="text" name="amount" style="background-color: #e3e0e0; "></p>
                <p class="form-text1">Note : <input type="text" name="txMemo" id="txMemo" style="background-color: #e3e0e0; "></p>
                <div class="botton" align="right"><input type="submit" value="submit" style="background-color: #e3e0e0; "></div>
            </div>
        </div>        
        </div>   
        </div>
        </form>
        
    </body>
</html>