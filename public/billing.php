<?php
            include('../includes/config.php');
            include('../includes/navbar.php');
            include('../includes/server.php');
?>
<html>
    <head>
        <title>Billing Payment</title>
        <meta charset="utf-8">
		<meta charset="TIS-620">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
        <link rel= "stylesheet" href="../assets/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    </head>
    <body>
        <p class="tx">Billing Payment</p>
        <form action="../handlers/billing_handle.php" method="get">
        <div class="main-form">    
        <div class="form">
        <p class="text1">Transferor information</p>
        <div class="main1">
            <div class="box1">     
                <p class="form-text1">Account :
                <select name="acctNumTf" id="bankAcct" required>
                    <!-- echo query result -->
                    <?php
                    $sql = 'select * from bank_account where user_id = '.$_SESSION['user_ID'];
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo '<option value='.$row['account_number'].'>'.$row['account_name'].': '.$row['account_number'].'.Balance:'.$row['account_balance'].'</option>';
                        }
                    }else{
                        echo '<option value=NoAcct>You need account to make a transaction</option>';
                    }
                    ?>
                </select></p>
            </div>
        </div>

        <div class="text1">Billing information</div>
        <div class="main1">
            <div class="box1">
                <p class="form-text1">Billing number : <input type="text" name="billingNum" style="background-color: #e3e0e0; "></p>
            </div>
        </div>
        
        <div class="text1">Transfer detail</div>
        <div class="main1">
            <div class="box1">
                <p class="form-text1">Transfer amount : <input type="text" name="amount" style="background-color: #e3e0e0; "></p>
                <p class="form-text1">Note : <input type="text" name="txMemo" id="txMemo" style="background-color: #e3e0e0; "></p>
                <div class="botton" align="right"><input type="submit" value="submit" style="background-color: #e3e0e0; "></div>
            </div>
        </div>    
        </div>
        </div>
        </form>
    </body>
</html>