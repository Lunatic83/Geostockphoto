<tr style="text-align: center;">    
    <td>
        <?php 
            echo $form->dropDownList($model,"[$id]idUserContactType",
            CHtml::listData($contacts,'idUserContactType','name'),
            array('empty'=>'--please select--',
                'style'=>"width:200px; margin-top: 5px; margin-bottom: 5px;")); 
        ?>
    </td>
    <td> 
        <?php 
            echo $form->textField($model,"[$id]uri",array('maxlength'=>200, 'style'=>"width:400px; margin-top: 5px; margin-bottom: 5px;"));
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
                    'onClick'=>'deletePersonalContacts($(this))', /*
                    'submit'=>'', 
                    'params'=>array(
                        'Student[command]'=>'delete', 
                        'Student[id]'=>$id, 
                        'noValidate'=>true)/**/
                    ));
        ?>
    </td>
</tr>