<?php
include('../includes/config.php');
include('../includes/navbar.php');
include('../includes/server.php');
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
		<link rel= "stylesheet" href="../assets/style.css">
		<style>
			table, th, td {
  			border:1px solid black;
			}
		</style>
	</head>
	
	<body>
		<?php
        if(!isset($_SESSION['user_ID'])){
            echo 'You need to login first.';
            exit();}
        ?>

  	<form method="post" action="../handlers/Insurance_apply.php">
  	<h1 class="text-insurance"> Insurance form </h1>
	<div class="main-insurance">
    <div class="box-insurance">
		<div class = "date">
			<c>Date :</c>
				<script>
					date = new Date().toLocaleDateString();
					document.write(date);
				</script>
		</div>
		<p class="text1">Your information</p>
		<?php
		$sql = 'select * from user_info where user_ID ='.$_SESSION['user_ID'];
	$result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
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
		
			<td><b>**Please mark type of insurance and assign coverage</b></td>
			<br>
			<hr style="border-color: gray;">
			<choices><input type="radio" name="insurance_category_code" value="01" required>Life Insurance</choices>
			<choices><input type="radio" name="insurance_category_code" value="02" style="margin-left: 45px;">Health Insurance</choices>
			<br>
			<choices><input type="radio" name="insurance_category_code" value="03">Auto Insurance</choices>
			<choices><input type="radio" name="insurance_category_code" value="04" style="margin-left: 38px;">Long-Term Care Insurance</choices>
			<br>
			<choices><input type="radio" name="insurance_category_code" value="05">Home Insurance</choices>
			<choices><input type="radio" name="insurance_category_code" value="06" style="margin-left: 28.5px;">Renters Insurance</choices>
			<br>
			<choices><input type="radio" name="insurance_category_code" value="07">Umbrella Insurance</choices>
			<choices><input type="radio" name="insurance_category_code" value="08" style="margin-left: 7.8px;">Disbillity Insurance</choices>
			<br><br>
			<td><b>Beneficiary : (if the allocation for each beneficiary is not specified, the Company assume that all allocations are in equal proportion)</b></td>
			<hr style="border-color: gray;">

	<table style="width:100%">
  		<tr>
    		<th>Beneficiary's firstname</th>
			<th>Beneficiary's lastname</th>
    		<th>Relation</th>
    		<th>Beneficiary's address</th>
			<th>% of Benefit</th>
  		</tr>
  		<tr>
    		<td><input name="name_of_beneficiary1" type="text" id="name_of_beneficiary1" value="" maxlength="20" required></td>
			<td><input name="lastname_of_beneficiary1" type="text" id="name_of_beneficiary1" value="" maxlength="20" required></td>
    		<td><input name="relationship_to_owner1" type="text" id="relationship_to_owner1" value="" required></td>
    		<td><input name="address_beneficiary1" type="text" id="address_beneficiary1" value="" required></td>
			<td><input name="percent_of_benefit1" type="text" id="percent_of_benefit1" value="" required></td>
		</tr>
  		<tr>
  			<td><input name="name_of_beneficiary2" type="text" id="name_of_beneficiary2" value="" ></td>
			<td><input name="lastname_of_beneficiary2" type="text" id="name_of_beneficiary1" value="" ></td>
    		<td><input name="relationship_to_owner2" type="text" id="relationship_to_owner2" value="" ></td>
    		<td><input name="address_beneficiary2" type="text" id="address_beneficiary2" value="" ></td>
			<td><input name="percent_of_benefit2" type="text" id="percent_of_benefit2" value="" ></td>
  		</tr>
  		<tr>
  			<td><input name="name_of_beneficiary3" type="text" id="name_of_beneficiary3" value="" ></td>
  			<td><input name="lastname_of_beneficiary3" type="text" id="name_of_beneficiary1" value="" ></td>
    		<td><input name="relationship_to_owner3" type="text" id="relationship_to_owner3" value="" ></td>
    		<td><input name="address_beneficiary3" type="text" id="address_beneficiary3" value="" ></td>
			<td><input name="percent_of_benefit3" type="text" id="percent_of_benefit3" value="" ></td>
  		</tr>
	</table>
		<br>
	    <div class="botton" align="right"><input name="INSERT" type="submit" id="INSERT" value="INSERT" ></div>
	</tr>
	<hr style="border-color: gray;">
		<note class="mark">Note : (For prompt underwriting, please identify the beneficiaries who have a relationship as parents, spouse, children or relatives who have a blood relationship with the applicant.)</note>
	</div>
	</div>
	</body>
</html>