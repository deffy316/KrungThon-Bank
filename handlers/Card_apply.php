<?php
include('../includes/config.php');
include('../includes/server.php');

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
		<link rel= "stylesheet" href="../assets/style.css">
	</head>
	<?php 
	$user = 'select * from user_info where user_ID ='.$_SESSION['user_ID'];
	$query = 'select * from bank_account where user_ID='.$_SESSION['user_ID'];
	$sa = 'select salary from user_info where user_ID ='.$_SESSION['user_ID'];
	$current_date = date_default_timezone_get();
	$sal = $con->query($sa);
	$salary = $sal->fetch_assoc();
	if(empty($_POST['Card_type'])){
		echo "Please select card type" ;
	}else{
		//esc//ape variables for security
		$card_type = mysqli_real_escape_string($con, $_POST['Card_type']);
		$card_expires = date("Y-m-d", strtotime ( '+3 Years' , strtotime ( $current_date ) )) ;
		$card_number = mysqli_real_escape_string($con, $_POST['gen']);
		$card_cvv = mysqli_real_escape_string($con, $_POST['gen2']);
	
		if(15000 <= $salary['salary'] && $salary['salary'] < 30000){
			$card_limit = 45000;
		}elseif(30000 <= $salary['salary'] && $salary['salary'] < 50000){
			$card_limit = 150000;
		}elseif($salary['salary'] > 50000){
			$card_limit = 250000;
		}else{
			echo '<h1 class="text-insurance">You are not eligible to apply cards</h1>';
			echo '<div class="box1">Your salary must be 15,000 or over to be able to apply cards.';
			echo '<form action="../public/user_info.php">
			<div class="botton" align="right"><input name="INSERT" type="submit" id="INSERT" value="Go to user info" ></div></div>
			</form>';
			exit();
		}
	
		$sql= "INSERT INTO user_card (card_cvv, card_limit, card_status, card_expires, card_number, card_type_code, user_ID)
		VALUES ('$card_cvv', '$card_limit', '1', '$card_expires', '$card_number', '$card_type', ".$_SESSION['user_ID'].")";
		if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
		}
	}
	?>
	<h1 class="text-insurance">Successfully apply card</h1>
	<div class="main1">
	<p class="text1">Your information</p>
    <div class="box1">
	<?php	
	$result = $con->query($user);
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

	<div class="main1">
		<div class="text1">Personal Information</div>
		<div class="box1">	
			<?php
	$result = $con->query($user);
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
	
	<div class="main1">
		<div class="text1">Card Information</div>
		<div class="box1">	
	<?php
                        echo "<p class=\"form-text1 space\">Card number : ".$card_number."</p>";
						echo "<p class=\"form-text1 space\">Card type code : ".$card_type."</p>";
						echo "<p class=\"form-text1 space\">Card expires : ".$card_expires."</p>";
						echo "<p class=\"form-text1 space\">Card limit : ".$card_limit."</p>";
	?>
	<form action="../public/user_info.php">
	<div class="botton" align="right"><input name="INSERT" type="submit" id="INSERT" value="Go to user info" ></div>
	</form>
	
</html>