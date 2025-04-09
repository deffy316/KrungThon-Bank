<html>
    <body>
        <?php
        session_start();
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', 1);
            error_reporting(-1);
            include('../includes/server.php');
            $a = mysqli_real_escape_string($con,$_GET["acctNumTf"]);
            $b = mysqli_real_escape_string($con,$_GET["cardNum"]);
            $_SESSION['temp'] = $b;
            $c = mysqli_real_escape_string($con,$_GET["amount"]);
            $e = mysqli_real_escape_string($con,$_GET["txMemo"]);
            $sql = "select account_balance from bank_account where account_number=".$a;
            $result = $con->query($sql);
            $sum = $c+20;
            $row = $result->fetch_assoc();
            if ($sum > $row['account_balance']){
                echo 'Not enough money in the bank account <br>';
                echo '<input type="button" value="BACK" onclick="window.location.href=\'../public/card.php\'">';
                exit();
            }
            $sql = "INSERT INTO transaction(account_number_transferor,amount,transaction_category_code,transaction_memo,fee)
            values('$a','$c',3,'$e',20)";
            if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
                }
            $update1 = "update bank_account
            set account_balance = account_balance - '$sum'
            where account_number = '$a'";
            if (!mysqli_query($con,$update1)) {
                die('Error: ' . mysqli_error($con));
                }
            header('Location:../public/reciept.php');
        ?>
        <br><br>
        </form>
    </body>
</html>

