<div id="shopping">
	<div id="shoppingRF" >
		<table id="shoppingOpts">
		    <thead>
		        <tr>
		            <td style="text-align: left;">Contact</td>
		            <td>Uri</td>
	            	<td><?php echo CHtml::link('', '', array('style'=>'cursor: pointer', 'onClick'=>'addPersonalContacts($(this), \''.get_class($modelUser).'\')', 'class'=>'icon-plus'));?></td>
	            	<span style="color: transparent">.<span>
		        </tr>
		    </thead>
		    <tbody>
		    <?php
	    	if(isset($personalContactsManager->items['n1'])){
			    foreach($personalContactsManager->items as $id=>$personalContacts):
			    	$this->render('_formPersonalContacts', array('id'=>$id, 'model'=>$personalContacts, 'form'=>$form,'contacts'=>$contacts ));
			    endforeach;
			}

		    ?>
		    </tbody>
		</table>
		<?php $this->render('personalContactsJs', array('personalContactsManager'=>$personalContactsManager, 'form'=>$form, 'contacts'=>$contacts));?>
	</div>  <!-- END shopping RF -->					
	
</div>  <!-- END shopping -->