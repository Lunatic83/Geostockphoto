<h3>Hi report abuse manager</h3>


<p>The user #<?php echo $modelTicket->idUser; ?> email: <?php echo $modelTicket->idUser0->email; ?></p> sent a report abuse notify with this motivation:</p>
<p>Subject: <?php echo $modelTicket->subject; ?></p> 
<p>Message:</p>
<p><?php echo $modelTicket->message; ?></p>  


<?php
	$link = Yii::app()->createAbsoluteUrl('photo/view').'/'.$modelTicket->idProduct;
	echo 'Check the photo with a User Administrator to manage abuse ' .CHtml::link('Manage Abuse Photo', $link);
?>

