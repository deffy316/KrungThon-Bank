<?php
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
		<link rel= "stylesheet" href="style.css">
		<script>
            function gen(){
            return Math.floor(100000 + Math.random() * 900000000);
        }
        let d = gen();

		function gen2(){
            return Math.floor(100 + Math.random() * 90);
        }
        let a = gen2();
        </script>
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

        <?php
        if(!isset($_SESSION['user_ID'])){
            echo 'You need to login first.';
            exit();}
        ?>

	<p class="tx">Card apply Form </p>
	
  	<form method="post" action="Card_apply.php">
	<input type="hidden" id="gen" name = "gen" value="">
	<input type="hidden" id="gen2" name = "gen2" value="">
	<div class="main-form">
	<div class="form">
  	<div class="main1">
		<div class="text1">Account Information</div>
		<div class="box1">
			<div class = "date">
			<c>Date :</c>
			<script>
				date = new Date().toLocaleDateString();
				document.write(date);
			</script>
			</div>
			<br>
			
			<?php
            $sql = 'select * from user_info where user_ID ='.$_SESSION['user_ID'];
            $query = 'select * from bank_account where user_ID='.$_SESSION['user_ID'];
	$result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
						echo "<p class=\"form-text1\">user_ID : ".$row["user_ID"]."</p>";
                        echo "<p class=\"form-text1\">Firstname : ".$row["name"]."</p>";
						echo "<p class=\"form-text1\">Lastname : ".$row["lastname"]."</p>";
                        echo "<p class=\"form-text1\">ID Card Number : ".$row["ID_card_Number"]."</p>";
						}
                    }

	$result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<p class=\"form-text1\">Account number : ".$row["account_number"]."</p>";
                        }
                    }
				?>

	</div>
	</div>
<div class="text1">Personal Information</div>
	<div class="main1">
		<div class="box1">	
			<?php
	$result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
							
							echo "<p class=\"form-text1\">Date of birth : ".$row["date_of_birth"]."</p>";
							echo "<p class=\"form-text1\">Phone number : ".$row["phone_number"]."</p>";
							echo "<p class=\"form-text1\">Career : ".$row["career"]."</p>";
							echo "<p class=\"form-text1\">Salary : ".$row["salary"]."</p>";
							echo "<p class=\"form-text1\">Address : ".$row["address"]."</p>";
							echo "<p class=\"form-text1\">Work address : ".$row["work_address"]."</p>";
                        }
                    }
	?>
	</div>
	</div>

	<div class="text1">Card Information</div>
	<div class="main1">
		<div class="box1">

		<td class="form-text1">Card type : </td>
		<td class="form-text1"><select name ="Card_type" id="Card_type">
			<option value ="01">Debit card</option>
			<option value ="02">Credit card</option>
			<option value ="03">Prepaid</option>
			<option value ="04">Forex</option>
			<option value ="05">Comercial credit</option>
		</select></td>
		<br><br>
		
	<c class="form-text1">Card expire :</c>
	<div id="current_date" class="current_date">
	<script>
	date = new Date();
	year = date.getFullYear() +5;
	month = date.getMonth() + 1;
	day = date.getDate();
	document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;
	</script>
	</div>

	<br><br>	
	    <div class="botton" align="right"><input name="INSERT" type="submit" id="INSERT" value="submit" onclick="document.getElementById('gen').value = d;document.getElementById('gen2').value = a" ></div>
		</div>
		</div>
	</div>
	</div>
	</body>
</html>