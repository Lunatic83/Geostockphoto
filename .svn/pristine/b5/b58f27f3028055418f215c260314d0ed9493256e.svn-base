<tr style="text-align: center;">    
    <td>
		<?php 
            echo $form->dropDownList($model,"[$id]idSize",
			CHtml::listData($sizes,'idSize','code'),
			array('empty'=>'--please select--',
				'style'=>"width:150px; margin-top: 5px; margin-bottom: 5px;")); 
        ?>
    </td>
    <td>
		<?php 
            echo $form->dropDownList($model,"[$id]idLicense",
			CHtml::listData($licenses,'idLicense','name'),
			array('empty'=>'--please select--','style'=>"margin-top: 5px; margin-bottom: 5px;")); 
        ?>
    </td>
    <td> 
        <?php 
            echo $form->textField($model,"[$id]price2dec",array('maxlength'=>10, 'style'=>"width:150px; margin-top: 5px; margin-bottom: 5px;"));
        ?>
    </td>
 
    <td>
        <?php 
                echo CHtml::link(
                '', 
                '', 
                array(
                	'style'=>'cursor: pointer; padding-bottom:10px; margin-top: 5px; margin-left:0px; margin-bottom: 5px;',
                    'class'=>'icon-remove',
                    'onClick'=>'deleteShoppingOpt($(this))', /*
                    'submit'=>'', 
                    'params'=>array(
                        'Student[command]'=>'delete', 
                        'Student[id]'=>$id, 
                        'noValidate'=>true)/**/
                    ));
        ?>
    </td>
</tr>