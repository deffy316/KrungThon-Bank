<html>
    <body>
        <?php
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', 1);
            error_reporting(-1);
            session_start();
            include('../includes/server.php');
            
            $acctNumTf = mysqli_real_escape_string($con,$_GET["acctNumTf"]);
            $amount = mysqli_real_escape_string($con,$_GET["amount"]);
            $billingNum = mysqli_real_escape_string($con,$_GET["billingNum"]);
            $_SESSION['temp'] = $billingNum;
            $txMemo = mysqli_real_escape_string($con,$_GET["txMemo"]);
            $sql = "select account_balance from bank_account where account_number=".$acctNumTf;
            $result = $con->query($sql);
            $sum = $amount+20;
            
            $row = $result->fetch_assoc();
            if ($sum > $row['account_balance']){
                echo 'Not enough money in the bank account <br>';
                echo '<input type="button" value="BACK" onclick="window.location.href=\'../public/billing.php\'">';
                exit();
            }
            $insert = "INSERT INTO transaction(account_number_transferor,amount,transaction_memo,transaction_category_code,fee)
            values('$acctNumTf','$amount','$txMemo',02,20)";
            if (!mysqli_query($con,$insert)) {
                die('Error: ' . mysqli_error($con));
                }
            $update1 = "update bank_account set account_balance = account_balance - '$sum' where account_number = '$acctNumTf'";
            if (!mysqli_query($con,$update1)) {
                die('Error: ' . mysqli_error($con));
                }
            header('Location:../public/reciept.php');
        ?>
        </form>
    </body>
</html>
