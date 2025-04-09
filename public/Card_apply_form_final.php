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

        <?php
        if(!isset($_SESSION['user_ID'])){
            echo 'You need to login first.';
            exit();}
        ?>

	<p class="tx">Card apply Form </p>
	
  	<form method="post" action="../handlers/Card_apply.php">
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