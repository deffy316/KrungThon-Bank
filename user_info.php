<?php 
    session_start();
    ini_set('display_startup_errors', 1);
            ini_set('display_errors', 1);
            error_reporting(-1);
    include('server.php'); 
    
    $sql = 'select * from user_info where user_ID = '.$_SESSION['user_ID'];
    $query = 'select * from bank_account where user_ID = '.$_SESSION['user_ID'];
    $show_beneficiary = 'select * from insurance_beneficiary_info ib, insurance i,type_of_insurance t where ib.insurance_number = i.insurance_number 
    AND i.insurance_category_code= t.insurance_category_code AND i.user_ID =' .$_SESSION['user_ID'];
    $card = 'select * from user_card uc, card_type_info cti where uc.card_type_code = cti.card_type_code AND uc.user_ID =' .$_SESSION['user_ID'];
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User information</title>

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

    <h2 class="userinfo-text">User information</h2>
        
        <div class="main-us">
        <div class="userimg">
         <div class="um">   
        <img src="picture/user.png" alt="Avatar" class="avatar" style="width:50%;">
        </div>
        <div class="user-box">
    <?php 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "Name : ".$row["name"];
            echo "&nbsp; ".$row["lastname"]."<br>";
            echo "Sex : ".$row["sex"]."<br>";
            echo "Birthday : ".$row["date_of_birth"]."<br>";
            echo "ID Card Number : ".$row["ID_card_Number"]."<br>";
            echo "Address : ".$row["address"]."<br>";
            echo "Phone Number : ".$row["phone_number"]."<br>";
            
            }
        }
    
    
    ?>
    </div>
    </div>
    </div>

    <div class="f">
    <div class="user-box2">
        <h3 class="userinfo-text2">Bank Account</h3>
        <?php 
        $result = $conn->query($query);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "Account name : ".$row["account_name"]."<br>";
                echo "Account number : ".$row["account_number"]."<br>";
                echo "Balance : ".$row["account_balance"]."<br>";
                echo "Account type : ".$row["account_type"]."<br>";
                echo "Branch of Bank : ".$row["branch_name"]."<br><br>";
                }
            echo "<br>";
            $url = 'apply_account.php';
            $text = 'Click here';
            $link = '<a href="' . $url . '">' . $text . '</a>';   
            echo " Open a new account. $link";  
            }
         
           else{
            
            $url = 'apply_account.php';
            $text = 'Click here';
            $link = '<a href="' . $url . '">' . $text . '</a>';

            echo " If you do not have an account yet. $link";

           }
        ?>
    </div>

    
    <div class="user-box2">
        <h3 class="userinfo-text2">User Card</h3>
        <?php 
        $result = $conn->query($card);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                
                echo "Card number : ".$row["card_number"]."<br>";
                echo "Card type : ".$row["card_type"]."<br>";
                echo "Card brand : ".$row["card_brand"]."<br>";
                echo "Card expires : ".$row["card_expires"]."<br>";
                echo "Card limit : ".$row["card_limit"]."<br><br>";
                }
            echo "<br>";
            $url = 'Card_apply_form_final.php';
            $text = 'Click here';
            $link = '<a href="' . $url . '">' . $text . '</a>';

            echo "Apply for new card. $link";
            }
            
           else{
            
            $url = 'Card_apply_form_final.php';
            $text = 'Click here';
            $link = '<a href="' . $url . '">' . $text . '</a>';

            echo " If you do not have an card yet. $link";

           }
        ?>
    </div>
    <div class="user-box2">
        <h3 class="userinfo-text2">Insurance</h3>
        <?php 
        $result = $conn->query($show_beneficiary);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                
                echo "Insurance number : ".$row["insurance_number"]."<br>";
                echo "Beneficiary name : ".$row["beneficiary_name"];
                echo "&nbsp; ".$row["beneficiary_lastname"]."<br>";
                echo "Relationship to owner : ".$row["relationship_to_owner"]."<br>";
                echo "Beneficiary address : ".$row["address_beneficiary"]."<br>";
                echo "Percent of benefit : ".$row["percent_of_benefit"]."<br>";
                echo "Insurance code describtion : ".$row["insurance_code_describtion"]."<br>";
                echo "Maximum coverage : ".$row["maximum_coverage"]."<br>";
                echo "Insurance start date : ".$row["insurance_start_date"]."<br>";
                echo "Insurance end date : ".$row["insurance_end_date"]."<br><br>";
                }
            echo "<br>";
            $url = 'Insurance_apply_form_final.php';
            $text = 'Click here';
            $link = '<a href="' . $url . '">' . $text . '</a>';

            echo "Apply for new insurance. $link";
            }
            
           else{
            
            $url = 'Insurance_apply_form_final.php';
            $text = 'Click here';
            $link = '<a href="' . $url . '">' . $text . '</a>';

            echo " If you do not have an insurance yet. $link";

           }
        ?>
    </div>
    </div>

</body>
</html>