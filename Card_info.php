<?php
	session_start();
?>

<html>	
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
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


  
	<p class="tx">Card information</p>

  	<div class="row-card">
	<div class="leftcolumn-card">
	  <div class="card_info">
		<h2>Debit card</h2>
			<img src="picture/debit card.webp" style="width: 100%;">
		<p>Payment card that can be used in place of cash to make purchases, the money for the purchase must be in the cardholder's bank account at the time of 
			a purchase and is immediately transferred directly from that account to the merchant's account to pay 
			for the purchase.</p>
      <a class="button-apply" href="Card_apply_form_final.php" >Apply</a>
	  </div>

	  <div class="card_info">
		<h2>Forex card</h2>
		<img src="picture/forex-card.webp" style="width: 100%;">
		<p>Prepaid travel card that you can load with a foreign currency of your choice. 
			You can use a forex card just like a credit or debit card to pay for your expenses in a local currency abroad.
			You can withdraw local cash from an ATM.</p>
      <a class="button-apply" href="Card_apply_form_final.php" >Apply</a>
	  </div>
	</div>

	<div class="rightcolumn-card">
	  <div class="card_info">
		<h2>Credit card</h2>
		<img src="picture/new-credit-card.jpg" style="width: 100%;">
		<p>A Payment card issued to users (cardholders) to enable the cardholder to pay 
			a merchant for goods and services based on the cardholder's accrued debt. The card issuer
			(usually a bank or credit union) creates a revolving account and grants a line of credit to 
			the cardholder, from which the cardholder can borrow money for payment to a merchant or as a 
			cash advance.</p>
      <a class="button-apply" href="Card_apply_form_final.php" >Apply</a>
	  </div>

	  <div class="card_info">
		<h2>Prepaid card</h2>
		<img src="picture/Prepaid-Credit-Card.jpg" style="width: 100%;">
		<p>A card you can use to pay for things. You buy a card with money loaded on it. 
			Then you can use the card to spend up to that amount. A prepaid card is also called a prepaid debit card, 
			or a stored-value card.</p>
      <a class="button-apply" href="Card_apply_form_final.php" >Apply</a>
	  </div>

	  <div class="card_info">
		<h2>Commercial credit card</h2>
		<!-- <div class="fakeimg" style="height:200px;">Image</div> -->
		<img src="picture/Commercial credit.png" style="width: 100%;">
		<p>A card that are given by businesses to their employees so that 
			the workers can buy supplies on their employer's behalf.
			The cards are often co-branded with specific retailers or fuel stations,
			limiting the ability of workers to make purchases at those stores only.</p>
      <a class="button-apply" href="Card_apply_form_final.php" >Apply</a>
	  </div>
	</div>
  </div>



	</body>
</html>