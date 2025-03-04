<?php 

    $servername = "35.240.246.187"; /* แก้กลับด้วยนะ*/ 
    $username = "root";
    $password= "25452545" ;
    $dbname = "bankdb"; /* แก้กลับด้วยนะ*/

    //Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    //Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }
?>