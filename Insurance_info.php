<?php
	session_start();
?>
<html>	
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
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
		

		<h1 class="tx">Insurance information</h1>
		  <div class="row-insurance">
			<div class="leftcolumn-insu">
			  <div class="card_insu">
				<h2>Life insurance</h2>
					<img src="picture/life-insurance.png" style="width: 100%;">
				<p>A life insurance policy guarantees the insurer pays a sum of money to one 
					or more named beneficiaries when the insured person dies in exchange for premiums paid by the policyholder during their lifetime.</p>
				<p><b>Maximum coverage : </b> 500,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>

			  <div class="card_insu">
				<h2>Health Insurance</h2>
				<img src="picture/health-insurance.webp" style="width: 100%;">
				<p>Health insurance is a type of coverage that helps individuals and families pay 
					for medical expenses. It is designed to provide financial protection in the event of unexpected illnesses, injuries, or medical conditions.</p>
				<p><b>Maximum coverage :</b> 200,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>

			  <div class="card_insu">
				<h2>Long-term care insurance</h2>
				<img src="picture/long-term-care-insurance.png" style="width: 100%;">
				<p>A long-term care insurance policy helps cover the costs of that care when you have a chronic medical condition, disability or disorder such as Alzheimer's disease. 
					Most policies will reimburse you for care given in a variety of places</p>
				<p><b>Maximum coverage : </b> 250,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>

			  

			</div>

			<div class="rightcolumn-insu">
			  <div class="card_insu">
				<h2>Auto insurance</h2>
				<img src="picture/car-insurance.webp" style="width: 100%;">
				<p>Auto insurance is a contract between you and the insurance company that 
					protects you against financial loss in the event of an accident or theft. In exchange for your paying a premium, 
					the insurance company agrees to pay your losses as outlined in your policy.</p>
				<p><b>Maximum coverage : </b> 150,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>

			  <div class="card_insu">
				<h2>Home insurance</h2>
				<img src="picture/home-insurance.jpeg" style="width: 100%;">
				<p>Homeowners insurance is a form of property insurance that covers losses and damages to an individual's residence, along with furnishings and other assets in the home. 
					Homeowners insurance also provides liability coverage against accidents in the home or on the property.</p>
				<p><b>Maximum coverage : </b> 600,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>

			  <div class="card_insu">
				<h2>Renters insurance</h2>
				<img src="picture/renters.jpg" style="width: 100%;">
				<p>A renters insurance policy is a group of coverages designed to help protect renters living in a house or apartment. A typical renters insurance policy includes three 
					types of coverage that help protect you, your belongings and your living arrangements after a covered loss.</p>
				<p><b>Maximum coverage : </b> 400,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>

			  <div class="card_insu">
				<h2>Umbrella insurance</h2>
				<img src="picture/umbrella.jpg" style="width: 100%;">
				<p>Umbrella insurance is a type of personal liability insurance that can be indispensable when you find yourself liable for a claim larger than your homeowner's insurance 
					or auto insurance will cover. If you own a boat, umbrella insurance will also pick up where your watercraft's liability insurance leaves off.</p>
				<p><b>Maximum coverage : </b> 200,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php" >Apply</a>
			  </div>
			  
			  <div class="card_insu">
				<h2>Disbility insurance</h2>
				<img src="picture/disability.png" style="width: 100%;">
				<p>Disability insurance is a type of insurance product that provides income in the event that a policyholder is prevented from working and earning an income due to a disability.</p>
				<p><b>Maximum coverage : </b> 120,000 baths</p>
				<a class="button-apply" href="Insurance_apply_form_final.php">Apply</a>
			  </div>
			</div>
		  </div>
		
	</body>
</html>