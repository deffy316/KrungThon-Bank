<?php 
    include('../includes/config.php');
    include('../includes/navbar.php');
    include('../includes/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta charset="TIS-620">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="../assets/style.css">
    <title>apply_account</title>
    <script>
            function gen(){
            return Math.floor(100000 + Math.random() * 9000000000);
        }
        let d = gen();
    </script>

    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    
    <p class="tx">Open an Account</p> 
    
    <div class="main-form">
    <div class="form">
    <div class="box1">
    <div class = "date-account">
		<c>Date :</c>
			<script>
				date = new Date().toLocaleDateString();
				document.write(date);
			</script>
	</div>

        <div>
        <form action="../handlers/apply_account_db.php" method="post">
        <input type="hidden" id="gen" name = "gen" value="">
        <?php include('../includes/errors.php'); ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class = "error" >
                <h3>
                    <?php 
                        
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3> 
        <?php  endif ?>
        </div>

        <div class="input-group">
            <label for="account_name" style="padding-top:20px;">Account name</label>
            <input type="text" name="account_name" style="background-color: #e3e0e0;">
        </div>

        <div>
            <label for="account_type">Account Type:</label>
            <select name="account_type" id="account_type">
                <option value="Saving account">Saving account</option>
                <option value="Current account">Current account</option>
                <option value="Salary account">Salary account</option>
                <option value="Fixed deposit account">Fixed deposit account</option>
                <option value="Recurring deposit account">Recurring deposit account</option>
            </select>
        </div><br>

        <div>
            <label for="branch_name">Branch:</label>
            <select name="branch_name" id="branch_name">
                <option value="CMU">Chiang Mai University</option>
                <option value="KMUTT">King Mongkut's University of Technology Thonburi</option>
                <option value="TU">Thammasat University</option>
                <option value="SWU">Srinakharinwirot University</option>
                
            </select>
        </div>
        <br><br>
        
        <div> 
            <button type="submit" name="apply_user" onclick="document.getElementById('gen').value = d">Submit</button>
        </div>
        
    </form>
        </div>
    </div>
    </div>
</body>
</html>