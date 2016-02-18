<tr>    
    <td>
		<?php echo $form->dropDownList($model,"[$id]idSize",
			CHtml::listData($sizesRM,'idSize','code'),
			array(/*'empty'=>'--please select--', */'disabled'=>'true',
				'style'=>"width:120px; margin-top: 5px; margin-bottom: 5px; color: #B8B8B8")
		); ?>
    </td>
    <td>
		<?php echo $form->dropDownList($modelDetails,"[$id]idRMtype",
			CHtml::listData($licensesRM,'idRMtype','nameRMtype'),
			array('empty'=>'--please select--',
				'onfocus'=>"this.oldvalue = this.value;",
				'onchange'=>"selectionRmType('".$id."', this); this.oldvalue = this.value;",
				'style'=>"width:160px;  margin-top: 5px; margin-bottom: 5px;"
			)
		);?>
    </td>
    <td>
    	<?php
    	for($i=0; $i<count($licensesRM); $i++){
    		echo "<div id='".$id."_".$licensesRM[$i]->idRMtype."' style='display:";
    		if($licensesRM[$i]->idRMtype!=$modelDetails->idRMtype)
				echo "none";
			echo "'>";
				echo $form->dropDownList($modelDetails,"[$id][$i]idRMdetails",
					CHtml::listData($licensesRM[$i]->confLicenseRmDetails,'idRMdetails','nameRMdetails'),
					array('empty'=>'--please select--','style'=>"width:200px; margin-top: 5px; margin-bottom: 5px;")
				);
			echo "</div>";
		}
		?>
    </td>
    <td>
		<?php echo $form->dropDownList($model,"[$id]idDuration",
			CHtml::listData($durationRm,'idDuration','duration'),
			array(/*'empty'=>'--please select--', */'disabled'=>'true',
				'style'=>"width:120px; margin-top: 5px; margin-bottom: 5px; color: #B8B8B8")
		); ?>
    </td>
    <td> 
        <?php echo $form->textField($model,"[$id]price2dec",array('maxlength'=>10, 'style'=>"width:150px; margin-top: 5px; margin-bottom: 5px;"));?>
    </td>
 
    <td>
        <?php echo CHtml::link(
                '', 
                '', 
                array(
                	'style'=>'cursor: pointer',
                    'class'=>'icon-remove',
                    'onClick'=>'deleteShoppingOptRm($(this))', 
                )
		);?>
    </td>
</tr>