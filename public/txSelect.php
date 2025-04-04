<?php
	include(__DIR__.'/../includes/config.php');
  include(ROOT_PATH.'/includes/navbar.php');
?>

<html>
    <head>
        <title>Transaction Form</title>
        <link rel= "stylesheet" href="style.css">
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
              <a class="botton2" href="form.php">Transfer</a>
              <img src="picture/transfer.jpg" style="display: block; width: 100%;">          
            </div>
          </div>

          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="billing.php">Billing</a>
              <img src="picture/billing.jpg" style="display: block; width: 100%;">               
            </div>
          </div>

          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="card.php">Card</a>
              <img src="picture/pay_card.jpg" style="display: block; width: 100%;">    
            </div>
          </div>

          <div class="column-selecttx">
            <div class="selecttx">
              <a class="botton2" href="phone.php">Top up</a>
              <img src="picture/top-up.jpg" style="display: block; width: 100%;">
            </div>
          </div>

        </div>
    </body>
</html>