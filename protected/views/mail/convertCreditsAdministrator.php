<h3>Hi Payments Manager</h3>

<p>The user #<?php echo $modelUser->idUser; ?></p>
<p>Username <?php echo $modelUser->username; ?></p>
<p>Email Paypal: <?php echo $modelUser->email; ?></p>
<p>Request to convert: <b><?php echo $modelTransaction->credits; ?></b> credits, with amount: <b><?php echo $modelTransaction->price; ?><b> $ </p>

<p>Has to be paid before next 15th of the month<p>