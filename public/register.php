<?php 
    
    include('../includes/config.php');
    include('../includes/navbar.php');
    include('../includes/server.php');
    include('../includes/errors.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <!--<div class="header">
        <h2>Register</h2> 

    </div>
    <form action="register_db.php" method="post">-->
        
        <?php if(isset($_SESSION['error'])) : ?>
            <div class = "error" >
                <h3>
                    <?php 
                        
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>

            </div>
        <?php  endif ?>
        <!--<div class="input-group">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname">
        </div>
        <div class="input-group">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname">
        </div>
        <div class="input-group">
            <label for="date_of_birth">Birthday</label>
            <input type="datetime-local" name="date_of_birth">
        </div>
        <div class="input-group">
            <label for="address">Address</label><br>
            <input type="text" name="address">
        </div>
        <div class="input-group">
            <label for="career">Career</label>
            <input type="text" name="career">
        </div>
        <div class="input-group">
            <label for="work_address">Work ddress</label><br>
            <input type="text" name="work_address">
        </div>
        <div class="input-group">
            <label for="salary">Salary</label>
            <input type="text" name="salary">
        </div>
        <div class="input-group">
            <label for="phone_number">Phone number</label>
            <input type="text" name="phone_number" placeholder="(000) 000-0000" >
        </div>
        
        <div class="input-group">
            <p>Sex :</p>
            <input type="radio" name="sex" value="male">   
            <label for="sex">Male</label>
            <input type="radio" name="sex" value="female">   
            <label for="sex">Female</label>
            <input type="radio" name="sex" value="other">   
            <label for="sex">Other</label>
        </div>
        <div class="input-group">
            <label for="ID_card_Number">ID Card Number</label>
            <input type="text" name="ID_card_Number" >
        </div>
        <div class="input-group">
            <label for="password_1">password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Comfirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            
            <button type="submit" name="reg_user" class="btn">Create</button>
        </div>
        <p>Already a member?<a href="login.php">Sign in</a></p>
    </form>-->
    

    <form action="../handlers/register_db.php" method='post'>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class = "error" >
                <h3>
                    <?php 
                        
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>

            </div>
        <?php   endif ?>

  <div class="box-regist">
    <h2 class="textrigist-h2">Register</h2>
    <p>**Please fill in this form to create an account.**</p>
    <hr>

    <label for="firstname"><b>Firstname</b></label>
    <input type="text" placeholder="Enter Firstname" name="firstname"  required>

    <label for="lastname"><b>Lastname</b></label>
    <input type="text" placeholder="Enter lastname" name="lastname"  required>
    <br>

    <label for="date_of_birth"><b>Birthday</b></label>
    <input type="date" name="date_of_birth" required>
    <br><br><br>

    <label for="address"><b>Address</b</label><br>
    <input type="text" placeholder="Enter Address" name="address" >

    <label for="career"><b>Career</b></label>
    <input type="text" placeholder="Enter Career" name="career" required>

    <label for="work_address"><b>Work Address</b></label><br>
    <input type="text" placeholder="Enter Work Address" name="work_address" >

    <label for="salary"><b>Salary</b></label>
    <input type="text" placeholder="Enter Salary" name="salary" required>

    <label for="phone_number"><b>Phone number</b></label>
    <input type="text" name="phone_number" placeholder="(000) 000-0000" pattern=".{10}" maxlength="10" required>

    <p><b>Sex :</b></p>
    <input type="radio" name='sex' value='male'>   
    <label for="sex">Male</label>
    <input type="radio" name='sex' value='female'>   
    <label for="sex">Female</label>
    <br><br><br>

    <label for="ID_card_Number"><b>ID Card Number</b></label>
    <input type="text" placeholder="Enter ID Card Number" name="ID_card_Number" pattern=".{13}" maxlength="13" required>
    
    <label for="password_1">Password</label>
    <input type="password" placeholder="Enter Password" name="password_1" required>

    <label for="password_2">Comfirm password</label>
    <input type="password" placeholder="Please comfirm password" name="password_2" required>
    <hr>

    <button type="submit" class="btn" name="reg_user">Create</button>
  </div>
  
  <div class="box-regist signin">
    <p>Already a member? <a href="../public/home.php">log in</a></p>
  </div>
</form>


</body>
</html>