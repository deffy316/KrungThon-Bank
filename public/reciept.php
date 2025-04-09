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
        <link rel="stylesheet" href="../assets/style.css">
        
    </head>
    <body>
    <h1 class="text-reciept">Transaction success</h1>
    <br>
    <?php 
    $sql = 'select * from transaction order by date_and_time_of_transaction desc limit 1';
    
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $sqlnameTf = 'select * from bank_account where account_number = '.$row['account_number_transferor'];
    $result1 = $con->query($sqlnameTf);
    $row1 = $result1->fetch_assoc();
    ?>
    

<div class="main-reciept">
    <div class="box-reciept">
    <table class="tb-reciept">
    <tr>
        <th colspan= "2"><?php echo "TransactionID : ".$row['transaction_ID'];?></th>
    </tr>
    
    <tr>
        <td>From:
        <?php echo '<b>' .$row1['account_name'] .'</b>';?> 

        <?php echo $row['account_number_transferor'];?>
        </td>

        <td>To:
        <br>
        <?php 
        if($row['transaction_category_code']== 1 || $row['transaction_category_code']== 4){
            $sqlnameRc = 'select * from bank_account where account_number = '.$row['account_number_recipient'];
            $result2 = $con->query($sqlnameRc);
            $row2 = $result2->fetch_assoc();
            echo '<b>' .$row2['account_name'] .'</b>';
        }else if($row['transaction_category_code']== 2){
            echo '<b>Billing Number '.$_SESSION['temp'].'</b>';
        }else if($row['transaction_category_code']== 3){
            echo '<b>Card Number '.$_SESSION['temp'].'</b>';
        }else if($row['transaction_category_code']== 5){
            echo '<b>Phone Number '.$_SESSION['temp'].'</b>';
        }
        ?>
        <?php echo $row['account_number_recipient'];?>
        <br><br>
    </td>
    </tr>

    <tr>
        <td colspan= "2"><?php echo 'Amount : '.$row['amount'];?></td>
    </tr>  
    
    <tr>

        <td colspan= "2"><?php echo 'Fee : '.$row['fee'];?></td>
    </tr>    
    
        
    <tr>
        <td colspan= "2"><?php echo 'Time of the transaction : '.$row['date_and_time_of_transaction'];?></td>
        <br>
    </tr> 

    <tr>
    <form action="../public/txSelect.php">
       <td colspan= "2"><input type="submit" value="DONE" style="align: right;"></td>
    </form>
    </div>
    </tr>
</div>
</table> 
</body>
</html>