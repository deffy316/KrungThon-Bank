<?php 
    include('../includes/config.php');
    include('../includes/server.php');
    $errors = array();
    if(isset($_POST['login_user'])) {
        $ID_card_Number = mysqli_real_escape_string($con,$_POST['ID_card_Number']);
        
        $password = mysqli_real_escape_string($con,$_POST['password']);
        

        if(empty($ID_card_Number)){
            // echo '<script>alert("Username is required"); window.location.href="login.php";</script>';
            array_push($errors, "ID Card Number is required");
            $_SESSION['error'] = "ID Card Number is required";
            header("location: ../public/login.php");
        }
        
        if(empty($password)){
            array_push($errors, "Password is required");
            // echo '<script>alert("Password is required"); window.location.href="login.php";</script>';
            $_SESSION['error'] = "Password is required";
            header("location: ../public/login.php");
        }
        if(empty($password)&&empty($ID_card_Number)){
            array_push($errors, "ID Card Number and Password are required");
            // echo '<script>alert("Password is required"); window.location.href="login.php";</script>';
            $_SESSION['error'] = "ID Card Number and Password are required";
            header("location: ../public/login.php");
        }
        


        if(count($errors)==0){
           $query="SELECT password FROM user_info WHERE ID_card_Number = '$ID_card_Number'";
           $result = $con->query($query);
           $row = $result->fetch_assoc();
           $sql = "select user_id from user_info where id_card_number = '$ID_card_Number'";
            $ruserid = $con->query($sql);
            $userid = $ruserid->fetch_assoc();
           if ($row['password'] == $password){
            $_SESSION['ID_card_Number'] = $ID_card_Number;
            $_SESSION['user_ID'] = $userid['user_id'];
            $_SESSION['success'] = "You are now logged in";
            header("location: ../public/home.php");
           }else{
            //echo '<script>alert("Wrong username or password try again"); window.location.href="login.php";</script>';
            echo $row['password'],'<br>';
            echo $password;
            array_push($errors,"Wrong ID Card Number or password combination");
            $_SESSION['error'] = "Wrong ID Card Number or password try again";
            
             header("location: ../public/login.php");
           }


          
        }
    }

?>