<?php 
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();
    $errors = array();
    include('../includes/server.php');
    // $errors = array();
        $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
        $date_of_birth = mysqli_real_escape_string($con,$_POST['date_of_birth']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $career = mysqli_real_escape_string($con,$_POST['career']);
        $work_address = mysqli_real_escape_string($con,$_POST['work_address']);
        $salary = mysqli_real_escape_string($con,$_POST['salary']);
        $phone_number = mysqli_real_escape_string($con,$_POST['phone_number']);
        $sex = mysqli_real_escape_string($con,$_POST['sex']);
        $ID_card_Number = mysqli_real_escape_string($con,$_POST['ID_card_Number']);
        $password_1 = mysqli_real_escape_string($con,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($con,$_POST['password_2']);

        if(empty($firstname)){
            array_push($errors, "Firstname is required");
            $_SESSION['error'] = "Firstname is required";
            header("location: ../public/register.php");
        }
        if(empty($lastname)){
            array_push($errors, "Lastname is required");
            $_SESSION['error'] = "Lastname is required";
            header("location: ../public/register.php");
        }
        if(empty($date_of_birth)){
            array_push($errors, "Birthday is required");
            $_SESSION['error'] = "Birthday is required";
            header("location: ../public/register.php");
        }
        if(empty($address)){
            array_push($errors, "Address is required");
            $_SESSION['error'] = "Address is required";
            header("location: ../public/register.php");
        }
        if(empty($phone_number)){
            array_push($errors, "Phone number is required");
            $_SESSION['error'] = "Phone number is required";
            header("location: ../public/register.php");
        }
        if(empty($sex)){
            array_push($errors, "Sex is required");
            $_SESSION['error'] = "Sex is required";
            header("location: ../public/register.php");
        }
        if(empty($ID_card_Number)){
            array_push($errors, "ID Card Number is required");
            $_SESSION['error'] = "ID Card Number is required";
            header("location: ../public/register.php");
        }
        if(empty($password_1)){
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
            header("location: ../public/register.php");
        }
        
        if($password_1 != $password_2){
            array_push($errors, "The two password do not match");
            $_SESSION['error'] = "The two password do not matchd";
            header("location: ../public/register.php");
        }

        $user_check_query = "SELECT * FROM user_info WHERE name = '$phone_number'OR ID_card_number = '$ID_card_Number'";
        $query = mysqli_query($con, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['ID_card_Number']=== $ID_card_Number){
                array_push($errors, "ID Card Number already exists");
                $_SESSION['error'] = "ID Card Number already exists";
                header("location: ../public/register.php");  
            }
            if($result['phone_number']=== $phone_number){
                array_push($errors, "Phone number already exists"); 
                $_SESSION['error'] = "Phone number already exists";
                header("location: ../public/register.php");  
            }
        }

        $sql = "INSERT INTO user_info(name, lastname, date_of_birth, address, career, work_address, salary, phone_number, sex, ID_card_Number, password) VALUES('$firstname','$lastname','$date_of_birth','$address', '$career', '$work_address', '$salary', '$phone_number', '$sex', '$ID_card_Number', '$password_2')";
        if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        header('location: ../public/home.php');
        
    

?>