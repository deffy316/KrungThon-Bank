<?php
include('../includes/config.php');
include('../includes/server.php');

$user = 'select * from user_info where user_ID ='.$_SESSION['user_ID'];

if(empty($_POST['insurance_category_code'])){
	echo "Please select insurance type" ;
}elseif(empty($_POST['name_of_beneficiary1'])){
	echo "Please input beneficiary's name" ;
}elseif(empty($_POST['lastname_of_beneficiary1'])){
	echo "Please input beneficiary's lastname" ;
}elseif(empty($_POST['relationship_to_owner1'])){
	echo "Please input ID card number" ;
}elseif(empty($_POST['address_beneficiary1'])){
	echo "Please input beneficiary's address" ;
}elseif(empty($_POST['percent_of_benefit1'])){
	echo "Please input percent of benefit" ;
}else{
	
	$insurance_category_code = mysqli_real_escape_string($con, $_POST['insurance_category_code']);
	$name_of_beneficiary1 = mysqli_real_escape_string($con, $_POST['name_of_beneficiary1']);
	$lastname_of_beneficiary1 = mysqli_real_escape_string($con, $_POST['lastname_of_beneficiary1']);
	$relationship_to_owner1 = mysqli_real_escape_string($con, $_POST['relationship_to_owner1']);
	$address_beneficiary1 = mysqli_real_escape_string($con, $_POST['address_beneficiary1']);
	$percent_of_benefit1 = mysqli_real_escape_string($con, $_POST['percent_of_benefit1']);

	$name_of_beneficiary2 = mysqli_real_escape_string($con, $_POST['name_of_beneficiary2']);
	$lastname_of_beneficiary2 = mysqli_real_escape_string($con, $_POST['lastname_of_beneficiary2']);
	$relationship_to_owner2 = mysqli_real_escape_string($con, $_POST['relationship_to_owner2']);
	$address_beneficiary2 = mysqli_real_escape_string($con, $_POST['address_beneficiary2']);
	$percent_of_benefit2 = mysqli_real_escape_string($con, $_POST['percent_of_benefit2']);

	$name_of_beneficiary3 = mysqli_real_escape_string($con, $_POST['name_of_beneficiary3']);
	$lastname_of_beneficiary3 = mysqli_real_escape_string($con, $_POST['lastname_of_beneficiary3']);
	$relationship_to_owner3 = mysqli_real_escape_string($con, $_POST['relationship_to_owner3']);
	$address_beneficiary3 = mysqli_real_escape_string($con, $_POST['address_beneficiary3']);
	$percent_of_benefit3 = mysqli_real_escape_string($con, $_POST['percent_of_benefit3']);

	$current_date = date_default_timezone_get();

	if($insurance_category_code == '01'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+5 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '02'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+1 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '03'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+6 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '04'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+2 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '05'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+1 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '06'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+1 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '07'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+1 Years' , strtotime ( $current_date ) )) ;
	}elseif($insurance_category_code == '08'){
		$insurance_end_date = date("Y-m-d", strtotime ( '+5 Years' , strtotime ( $current_date ) )) ;
	}


	$sql="INSERT INTO insurance (insurance_status, insurance_end_date, insurance_category_code, user_ID)
	VALUES ('1', '$insurance_end_date', '$insurance_category_code'," .$_SESSION['user_ID'].")";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}

	$latestTxsql = 'select insurance_number from insurance order by insurance_issue_date desc limit 1';
	$result = $con->query($latestTxsql);
	$rows = $result->fetch_assoc();

	$sql="INSERT INTO insurance_beneficiary_info (insurance_number, beneficiary_name, beneficiary_lastname, relationship_to_owner, address_beneficiary, percent_of_benefit)
	VALUES (".$rows['insurance_number'].", '$name_of_beneficiary1', '$lastname_of_beneficiary1', '$relationship_to_owner1', '$address_beneficiary1', '$percent_of_benefit1')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}

	
}


if(empty($_POST['name_of_beneficiary2'])){
}elseif(empty($_POST['lastname_of_beneficiary2'])){
}elseif(empty($_POST['relationship_to_owner2'])){
}elseif(empty($_POST['address_beneficiary2'])){
}elseif(empty($_POST['percent_of_benefit2'])){
}else{
$sql="INSERT INTO insurance_beneficiary_info (insurance_number, beneficiary_name, beneficiary_lastname, relationship_to_owner, address_beneficiary, percent_of_benefit)
	VALUES (".$rows['insurance_number'].",'$name_of_beneficiary2', '$lastname_of_beneficiary2', '$relationship_to_owner2', '$address_beneficiary2', '$percent_of_benefit2')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
}

if(empty($_POST['name_of_beneficiary3'])){
}elseif(empty($_POST['lastname_of_beneficiary3'])){
}elseif(empty($_POST['relationship_to_owner3'])){
}elseif(empty($_POST['address_beneficiary3'])){
}elseif(empty($_POST['percent_of_benefit3'])){
}else{
	$sql="INSERT INTO insurance_beneficiary_info (insurance_number, beneficiary_name, beneficiary_lastname, relationship_to_owner, address_beneficiary, percent_of_benefit)
	VALUES (".$rows['insurance_number'].",'$name_of_beneficiary3', '$lastname_of_beneficiary3', '$relationship_to_owner3', '$address_beneficiary3', '$percent_of_benefit3')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
		<link rel= "stylesheet" href="../assets/style.css">
	</head>
	<h1 class="text-insurance">Successfully apply insurance</h1>
	<div class="main-insurance">
    <div class="box-insurance">
	<p class="text1">Your information</p>

	<?php
	$results = $con->query($user);
		if ($results->num_rows > 0) {
			while($row = $results->fetch_assoc()) {
			echo "<p class=\"form-text1 space\">user_ID : ".$row["user_ID"]."</p>";
			echo "<p class=\"form-text1 space\">Firstname : ".$row["name"]."</p>";
			echo "<p class=\"form-text1 space\">Lastname : ".$row["lastname"]."</p>";
			echo "<p class=\"form-text1 space\">Date of birth : ".$row["date_of_birth"]."</p>";
			echo "<p class=\"form-text1 space\">ID Card Number : ".$row["ID_card_Number"]."</p>";
			echo "<p class=\"form-text1 space\">Address : ".$row["address"]."</p>";
			echo "<p class=\"form-text1 space\">Career : ".$row["career"]."</p>";
			echo "<p class=\"form-text1 space\">Salary : ".$row["salary"]."</p>";
			echo "<p class=\"form-text1 space\">Work address : ".$row["work_address"]."</p><br>";
			}
	}
	?>
		<p class="text1">Insurance information</p>
	<?php
                        echo "<p class=\"form-text1 space\">Insurance number : ".$rows['insurance_number']."</p>";
						echo "<p class=\"form-text1 space\">Insurance category code : ".$insurance_category_code."</p>";
						echo "<p class=\"form-text1 space\">Insurance start date : ".date("Y-m-d")."</p>";
						echo "<p class=\"form-text1 space\">Insurance end date : ".$insurance_end_date."</p>";
						echo "<p class=\"form-text1 space\">Insurance issue date : ".date("Y-m-d")."</p>";
	?>

		<p class="text1">Beneficiary information</p>
	<?php
                        echo "<p class=\"form-text1 space\">Beneficiary's name : ".$name_of_beneficiary1."</p>";
						echo "<p class=\"form-text1 space\">Beneficiary's lastname : ".$lastname_of_beneficiary1."</p>";
						echo "<p class=\"form-text1 space\">Relationship to owner : ".$relationship_to_owner1."</p>";
						echo "<p class=\"form-text1 space\">Beneficiary address : ".$address_beneficiary1."</p>";
						echo "<p class=\"form-text1 space\">Percent of benefit : ".$percent_of_benefit1."</p>";
						echo "<br>";

		if(empty($_POST['name_of_beneficiary2'])){
			}elseif(empty($_POST['lastname_of_beneficiary2'])){
			}elseif(empty($_POST['relationship_to_owner2'])){
			}elseif(empty($_POST['address_beneficiary2'])){
			}elseif(empty($_POST['percent_of_benefit2'])){
			}else{echo "<p class=\"form-text1 space\">Beneficiary's name : ".$name_of_beneficiary2."</p>";
				echo "<p class=\"form-text1 space\">Beneficiary's lastname : ".$lastname_of_beneficiary2."</p>";
				echo "<p class=\"form-text1 space\">Relationship to owner : ".$relationship_to_owner2."</p>";
				echo "<p class=\"form-text1 space\">Beneficiary address : ".$address_beneficiary2."</p>";
				echo "<p class=\"form-text1 space\">Percent of benefit : ".$percent_of_benefit2."</p>";
				echo "<br>";}

		if(empty($_POST['name_of_beneficiary3'])){
			}elseif(empty($_POST['lastname_of_beneficiary3'])){
			}elseif(empty($_POST['relationship_to_owner3'])){
			}elseif(empty($_POST['address_beneficiary3'])){
			}elseif(empty($_POST['percent_of_benefit3'])){
			}else{echo "<p class=\"form-text1 space\">Beneficiary's name : ".$name_of_beneficiary3."</p>";
				echo "<p class=\"form-text1 space\">Beneficiary's lastname : ".$lastname_of_beneficiary3."</p>";
				echo "<p class=\"form-text1 space\">Relationship to owner : ".$relationship_to_owner3."</p>";
				echo "<p class=\"form-text1 space\">Beneficiary address : ".$address_beneficiary3."</p>";
				echo "<p class=\"form-text1 space\">Percent of benefit : ".$percent_of_benefit3."</p>";
				echo "<br>";
			}

	?>
	<form action="../public/user_info.php">
	<div class="botton" align="right"><input name="INSERT" type="submit" id="INSERT" value="Go to user info" ></div>
	</form>
	</div>
	</div>
	
</html>