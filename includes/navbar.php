
<div class="navbar">
    <?php
    if(isset($_SESSION['ID_card_Number'])){
        // Logged in
        echo '<a class="w" style="float:right; color:white; weight:15px;" href="../public/user_info.php">Welcome ' .$_SESSION['ID_card_Number'].'</a>';
        echo '<a class="w" style="float:right; color:red;" href="../handlers/logout.php">LOGOUT</a>';
        echo ''.$_SESSION['user_ID'];
    }else{
        // Not logged in
        echo '<button onclick="openLoginModal()" style="width:auto; float:right;">Login</button>';
    }
    ?>
    <a class="w brand" href="../public/home.php">KrungThon</a>
    <?php if(isset($_SESSION['ID_card_Number'])): ?>
        <div class="dropdown">
            <button class="dropbtn">Services <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a class="w" href="../public/txSelect.php">Transaction</a>
                <a class="w" href="../public/apply_account.php">Open Account</a>
                <a class="w" href="../public/Card_apply_form_final.php">Card Apply</a>
                <a class="w" href="../public/Insurance_apply_form_final.php">Insurance Apply</a>
            </div>
        </div>
    <?php endif; ?>
    <div class="dropdown">
        <button class="dropbtn">About <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
            <a class="w" href="../public/Branch_info.php">Branch</a>
        </div>
    </div>
</div>
<script>
        function openLoginModal() {
            document.getElementById('id01').style.display = 'block';
        }
        
        function closeLoginModal() {
            document.getElementById('id01').style.display = 'none';
        }
        
        window.onclick = function(event) {
            var modal = document.getElementById('id01');
            if (event.target == modal) {
                closeLoginModal();
            }
        }
    </script>