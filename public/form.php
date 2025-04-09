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
        <title>Transaction Form</title>
        <link rel= "stylesheet" href="../assets/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function (){
            $('input[name="txType"]').change(function(){
                if($('#renewPayment').is(':checked')){
                    $('input[name="txFreq"]').removeAttr('disabled');
                    $('input[name="txFreq"]').attr('required',true);
                 }else{
                    $('input[name="txFreq"]').attr('disabled',true);
                }
            });
        });
        $(document).ready(function (){
            
        });
        </script>
    </head>
    <body>        
        <p class="tx">Transaction Form</p>
        <form action="../handlers/txForm.php" method="get">

       <div class="main-form">
        <div class="form">     
        <div class="text1">Transferor information </div>   
        <div class="main1">  
            <div class="box1">
                
                <p class="form-text1">Account :
                    <select name="acctNumTf" id="bankAcct" >
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
                    </select>
                   
                <p class="form-text1">Transaction Type: 
                    <input type="radio" name="txType" id="bankTransfer" value="01"> Bank Transfer
                    <input type="radio" name="txType" id="renewPayment" value="04" > Renew Payment </p>
            </div>   
        </div>
                
            
                <div class="text1">Recipient information</div>
                <div class="main1">
                    <div class="box1">
                        
                        <p class="form-text1">Account Number : <input type="text" name="acctNumRcp" style="background-color: #e3e0e0;"></p>
                
                    </div>    
                </div>

                <div class="text1">For renew payment</div>
                <div class="main1">  
                    <div class="box1">
                        
                    <p class="form-text1">Transaction Frequency: 
                        <input type="radio" name="txFreq" id="day" value="day" disabled> Day
                        <input type="radio" name="txFreq" id="month" value="month" disabled> Month
                        <input type="radio" name="txFreq" id="year" value="year" disabled> Year </p>
                    </div>    
                </div>

                <div class="text1">Transfer detail</div>
               <div class="main1"> 
                    <div class="box1">
                            
                        <p class="form-text1">Transfer amount : <input type="text" name="amount" style="background-color: #e3e0e0;"></p>
                        <p class="form-text1">Note : <input type="text" name="txMemo" id="txMemo" style="background-color: #e3e0e0;"></p>
                        <div class="botton" align="right"><input type="submit" value="submit" style="background-color: #e3e0e0;"></div>
                    </div>    
                </div>
            </div>      
            </div>  
            </form>
        
    </body>
</html>