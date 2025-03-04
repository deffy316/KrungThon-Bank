<html>
    <body>
        <?php
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', 1);
            error_reporting(-1);
            session_start();
            $con=mysqli_connect("35.240.246.187","root","25452545","bankdb");
            // Check connaection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
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
                echo '<input type="button" value="BACK" onclick="window.location.href=\'billing.php\'">';
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
            header('Location:reciept.php');
        ?>
        </form>
    </body>
</html>
