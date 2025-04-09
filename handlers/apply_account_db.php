<?php 
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();
    include('../includes/server.php');
    $errors = array();
    if(isset($_POST['apply_user'])) {
        $account_name = mysqli_real_escape_string($con,$_POST['account_name']);
        $account_type = mysqli_real_escape_string($con,$_POST['account_type']);
        $branch_name = mysqli_real_escape_string($con,$_POST['branch_name']);
        $account_number = mysqli_real_escape_string($con,$_POST['gen']);

        if(empty($account_name)){
            array_push($errors, "Account name is required");
            $_SESSION['error'] = "Account name is required";
            header("location: ../public/apply_account.php");
        }
        if(empty($account_type)){
            array_push($errors, "Account Type is required");
            $_SESSION['error'] = "Account Type is required";
            header("location: ../public/apply_account.php");
        }
        if(empty($branch_name)){
            array_push($errors, "Branch is required");
            $_SESSION['error'] = "Branch is required";
            header("location: ../public/apply_account.php");
        }
        
        // $user_check_query = "SELECT * FROM bank_account WHERE account_name = '$account_name'OR account_type = '$account_type'";
        // $query = mysqli_query($con, $user_check_query);
        // $result = mysqli_fetch_assoc($query);
        

        if(count($errors)==0){
           
            // $password = md5($password);
            //$query="SELECT * FROM user_info WHERE ID_card_Number = '$ID_card_Number'AND password = '$password'";
            //$result = mysqli_query($con, $query);
        $sql = "INSERT INTO bank_account (account_name, account_type, branch_name, account_number, user_ID, account_balance) VALUES('$account_name','$account_type','$branch_name','$account_number',".$_SESSION['user_ID'].",1000)";
                if (!mysqli_query($con,$sql)){
                    die('Error: ' . mysqli_error($con));
                }/*else{
                    //echo '<script>alert("Wrong username or password try again"); window.location.href="login.php";</script>';
                     array_push($errors,"Wrong ID Card Number or password combination");
                     $_SESSION['error'] = "Wrong ID Card Number or password try again";
                     
                    header("location: login.php");*/
                
                header("location: ../public/successfully_open_account.php");

         
                   
        }
        
            
        
    }