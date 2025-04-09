<?php session_start();?>
<html>
    <body>
        <?php
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', 1);
            error_reporting(-1);
            include('../includes/server.php');
            $a = mysqli_real_escape_string($con,$_GET["acctNumTf"]);
            $b = mysqli_real_escape_string($con,$_GET["acctNumRcp"]);
            $c = mysqli_real_escape_string($con,$_GET["amount"]);
            $d = mysqli_real_escape_string($con,$_GET["txType"]);
            $e = mysqli_real_escape_string($con,$_GET["txMemo"]);
            $sql = "select account_balance from bank_account where account_number=".$a;
            $result = $con->query($sql);
            
            $row = $result->fetch_assoc();
            if ($c > $row['account_balance']){
                echo 'Not enough money in the bank account <br>';
                echo '<input type="button" value="BACK" onclick="window.location.href=\'../public/home.php\'">';
                exit();
            }
            $sql = "select * from bank_account where account_number=".$b;
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            if($result->num_rows<=0){
                echo 'receipient number not exits <br>';
                echo '<input type="button" value="BACK" onclick="window.location.href=\'../public/form.php\'">';
                exit();
            }
            if ($_GET["txType"] != "04"){
            $sql = "INSERT INTO transaction(account_number_transferor,account_number_recipient,amount,transaction_category_code,transaction_memo,fee)
            values('$a','$b','$c','$d','$e',0)";
            if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
                }
            }else{
                $f = mysqli_real_escape_string($con,$_GET["txFreq"]);
                $sql = "INSERT INTO renew_transaction_info(renew_balance_to_be_paid,renew_paid_frequency,renew_status)
                values('$c','$f',0)";
                if (!mysqli_query($con,$sql)) {
                    die('Error: ' . mysqli_error($con));
                    }
            $latestTxsql = "select renew_transaction_ID from renew_transaction_info order by renew_issue_date desc limit 1";
            $result = $con->query($latestTxsql);
            while($row = $result->fetch_assoc()) {
                $latestTx = $row["renew_transaction_ID"];
              }
            $sql = "INSERT INTO transaction(account_number_transferor,account_number_recipient,amount,transaction_category_code,transaction_memo,renew_transaction_ID,fee)
            values('$a','$b','$c','$d','$e','$latestTx',0)";
            if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
                }
            }
            $update1 = "update bank_account
            set account_balance = account_balance - '$c'
            where account_number = '$a'";
            $update2 = "update bank_account
            set account_balance = account_balance + '$c'
            where account_number = '$b'";
            if (!mysqli_query($con,$update1)) {
                die('Error: ' . mysqli_error($con));
                }
            if (!mysqli_query($con,$update2)) {
                die('Error: ' . mysqli_error($con));
                }

            header('Location:../public/reciept.php');
        ?>
        <br><br>
        </form>
    </body>
</html>

