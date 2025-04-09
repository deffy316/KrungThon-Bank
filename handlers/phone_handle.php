<html>
    <body>
        <?php
        session_start();
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        error_reporting(-1);
        include('../includes/server.php');
            $acctNumTf = mysqli_real_escape_string($con,$_GET["acctNumTf"]);
            $amount = mysqli_real_escape_string($con,$_GET["amount"]);
            $phoneNum = mysqli_real_escape_string($con,$_GET["phoneNum"]);
            $_SESSION['temp'] = $phoneNum;
            $txMemo = mysqli_real_escape_string($con,$_GET["txMemo"]);
            $sum = $amount + 20;
            $sql = "select account_balance from bank_account where account_number=".$acctNumTf;
            $result = $con->query($sql);
            
            $row = $result->fetch_assoc();
            if ($sum > $row['account_balance']){
                echo 'Not enough money in the bank account <br>';
                echo '<input type="button" value="BACK" onclick="window.location.href=\'../public/phone.php\'">';
                exit();
            }
            $insert = "INSERT INTO transaction(account_number_transferor,amount,transaction_memo,transaction_category_code,fee)
            values('$acctNumTf','$amount','$txMemo',5,20)";
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
