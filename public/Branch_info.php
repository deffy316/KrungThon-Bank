<?php
include('../includes/config.php');
include('../includes/navbar.php');
include('../includes/server.php');
$sql = 'select * from branch';
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
		<link rel= "stylesheet" href="../assets/style.css">	
	</head>

	<body>
  	<h1 class="tx">Branch information</h1>
<div class="row-branch">
  <?php
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          
          echo "<div class=\"column-branch\">";
          echo "<div class=\"branch\">";
          echo "<h3>Branch name : ".$row["branch_name"]."</h3></p>";
          echo "<p style=\"text-align: left;\"><b>Address : </b>".$row["branch_address"]."</p>";
          echo "<p style=\"text-align: left;\"><b>Manager : </b>".$row["branch_manager"]."</p>";
          echo "</div>";
          echo "</div>";

    }
  }
  ?>
</div>
</body>
</html>