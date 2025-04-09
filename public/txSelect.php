<?php
	include('../includes/config.php');
  include('../includes/navbar.php');
?>

<html>
    <head>
        <title>Transaction Form</title>
        <link rel= "stylesheet" href="../assets/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="txFrom.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
		    <meta charset="TIS-620">
		    <link rel="preconnect" href="https://fonts.googleapis.com">
		    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">

    </head>
    <body>
      <p class="tx">Transaction</p>
      
        <div class="row-selecttx">
          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="../public/form.php">Transfer</a>
              <img src="../picture/transfer.jpg" style="display: block; width: 100%;">          
            </div>
          </div>

          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="../public/billing.php">Billing</a>
              <img src="../picture/billing.jpg" style="display: block; width: 100%;">               
            </div>
          </div>

          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="../public/card.php">Card</a>
              <img src="../picture/pay_card.jpg" style="display: block; width: 100%;">    
            </div>
          </div>

          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="../public/phone.php">Top up</a>
              <img src="../picture/top-up.jpg" style="display: block; width: 100%;">
            </div>
          </div>

        </div>
    </body>
</html>