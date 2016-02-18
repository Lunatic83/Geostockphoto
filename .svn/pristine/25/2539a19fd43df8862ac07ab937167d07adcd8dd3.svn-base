<div class="container well gsp-txt-color margin-top-bottom background_box" >
	<b>User id</b>: <?php echo $idUser; ?><br>
	<b>Ticket id</b>: <?php echo $idTicket; ?><br>
	<b>Error id</b>: <?php echo $idError; ?><br>
	<b>Description</b>: <?php echo $error['message']; ?><br>
	<b>Type</b>: <?php echo $error['type']; ?><br>
	<b>Trace</b>: <?php echo str_replace('#', '<br>#', $error['trace']); ?><br>
	<b>File</b>: <?php echo $error['file']; ?><br>
	<b>Line</b>: <?php echo $error['line']; ?><br>
	<b>Source</b>: <?php echo $error['source']; ?><br>
	<b>Source Url </b>: <?php echo $returnUrl; ?><br>
	<br>
	<b>Click to delete Ticket Session and logs: <?php echo CHtml::link('Delete Ticket',  Yii::app()->createAbsoluteUrl('site/deleteTicket/idTicket/'.$idTicket.''));  ?>. <br>
</div>
