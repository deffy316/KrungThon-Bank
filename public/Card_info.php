<?php
	include('../includes/config.php');
	include('../includes/navbar.php');
?>

<html>	
	<head>
		<meta charset="utf-8">
		<meta charset="TIS-620">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
		<link rel= "stylesheet" href="../assets/style.css">
	</head>

	<body>
  	
		


  
	<p class="tx">Card information</p>

  	<div class="row-card">
	<div class="leftcolumn-card">
	  <div class="card_info">
		<h2>Debit card</h2>
			<img src="../picture/debit card.webp" style="width: 100%;">
		<p>Payment card that can be used in place of cash to make purchases, the money for the purchase must be in the cardholder's bank account at the time of 
			a purchase and is immediately transferred directly from that account to the merchant's account to pay 
			for the purchase.</p>
      <a class="button-apply" href="../public/Card_apply_form_final.php" >Apply</a>
	  </div>

	  <div class="card_info">
		<h2>Forex card</h2>
		<img src="../picture/forex-card.webp" style="width: 100%;">
		<p>Prepaid travel card that you can load with a foreign currency of your choice. 
			You can use a forex card just like a credit or debit card to pay for your expenses in a local currency abroad.
			You can withdraw local cash from an ATM.</p>
      <a class="button-apply" href="../public/Card_apply_form_final.php" >Apply</a>
	  </div>
	</div>

	<div class="rightcolumn-card">
	  <div class="card_info">
		<h2>Credit card</h2>
		<img src="../picture/new-credit-card.jpg" style="width: 100%;">
		<p>A Payment card issued to users (cardholders) to enable the cardholder to pay 
			a merchant for goods and services based on the cardholder's accrued debt. The card issuer
			(usually a bank or credit union) creates a revolving account and grants a line of credit to 
			the cardholder, from which the cardholder can borrow money for payment to a merchant or as a 
			cash advance.</p>
      <a class="button-apply" href="../public/Card_apply_form_final.php" >Apply</a>
	  </div>

	  <div class="card_info">
		<h2>Prepaid card</h2>
		<img src="../picture/Prepaid-Credit-Card.jpg" style="width: 100%;">
		<p>A card you can use to pay for things. You buy a card with money loaded on it. 
			Then you can use the card to spend up to that amount. A prepaid card is also called a prepaid debit card, 
			or a stored-value card.</p>
      <a class="button-apply" href="../public/Card_apply_form_final.php" >Apply</a>
	  </div>

	  <div class="card_info">
		<h2>Commercial credit card</h2>
		<img src="../picture/Commercial credit.png" style="width: 100%;">
		<p>A card that are given by businesses to their employees so that 
			the workers can buy supplies on their employer's behalf.
			The cards are often co-branded with specific retailers or fuel stations,
			limiting the ability of workers to make purchases at those stores only.</p>
      <a class="button-apply" href="../public/Card_apply_form_final.php" >Apply</a>
	  </div>
	</div>
  </div>



	</body>
</html>