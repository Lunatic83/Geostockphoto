<div class="container well margin-top-bottom background_box">

	<?php if($author){?>
		This is the report with numbers and costs of all information we have edited in your photos.
	<?php }?>

	<?php for($i=0; $i<count($photographers); $i++){?>
		<?php if(!$author){?>
			<h5>Photographer: <span class='orange'><?php echo $photographers[$i]['username']?></span></h5>
		<?php }?>
		<table class="table table-bordered table-striped" style="width: 500px; margin-top: 10px">
			<thead>
				<tr>
					<td width='150px'></td>
					<td style="text-align: right">Category</td>
					<td style="text-align: right">Position</td>
					<td style="text-align: right">Total</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Number of Photos</td>
					<td style="text-align: right"><?php echo $photographers[$i]['numCat1']?></td>
					<td style="text-align: right"><?php echo $photographers[$i]['numPos']?></td>
					<td style="text-align: right"><?php echo $photographers[$i]['tot']?></td>
				</tr>
				<tr>
					<td>PayOut</td>
					<td style="text-align: right"><?php echo $photographers[$i]['numCat1']*$costCat1?></td>
					<td style="text-align: right"><?php echo $photographers[$i]['numPos']*$costPos?></td>
					<td style="text-align: right"><?php echo $photographers[$i]['numCat1']*$costCat1+$photographers[$i]['numPos']*$costPos?></td>
				</tr>
			</tbody>
		</table>
	<?php }
	if($author){?>
		You have <b><?php echo $numPendingSubmit?></b> photos waiting for your submission.<br>
		<?php if($numPendingSubmit>0){?>
			<a href="<?php echo Yii::app()->createUrl('photo/pendingsubmit')?>">Click here to send them for review!</a>
		<?php }?>
		<br><br>
		<?php if($numPrePending>0){?>
			There are other <b><?php echo $numPrePending?></b> photos which we are working on
			(and others may still be in our upload queue).
		<?php }?>
	<?php }?>
</div>