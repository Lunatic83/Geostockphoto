<?php
if($statisticsForm->selectInfo==1){
	$column=array(
		array( 
	      'name'=>'ID Photo',
	      'value'=> '$data->idProduct',
	      'htmlOptions'=>array(
		  	'id'=>'idProductResult',
	      	'width'=>'40px',
	      	'style'=>'text-align: center; cursor: pointer',
	      	'onClick'=>'updateProductInfo(this);'), 
	    ),
	     array( 
	      'header'=>'License',
	      'value'=> '$data->licenseType',
	      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Size',
	      'value'=> '$data->size',
	      'htmlOptions'=>array('width'=>'30px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Price',
	      'value'=> '$data->price',
	      'htmlOptions'=>array('width'=>'40px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Earned',
	      'value'=> '$data->earnedByUser',
	      'htmlOptions'=>array('width'=>'40px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Date and time',
	      'value'=> '$data->data', //insert_timestamp',
	      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
	    )
	);
}elseif($statisticsForm->selectInfo==2){
	$column=array(
		array( 
	      'name'=>'ID Photo',
	      'value'=> '$data->idProduct',
	      'htmlOptions'=>array(
		  	'id'=>'idProductResult',
	      	'width'=>'40px',
	      	'style'=>'text-align: center; cursor: pointer',
	      	'onClick'=>'updateProductInfo(this);'), 
	    ),
	     array( 
	      'header'=>'License',
	      'value'=> '$data->licenseType',
	      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Size',
	      'value'=> '$data->size',
	      'htmlOptions'=>array('width'=>'30px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Price',
	      'value'=> '$data->price',
	      'htmlOptions'=>array('width'=>'40px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Date and time',
	      'value'=> '$data->data', //insert_timestamp',
	      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
	    )
	);
}elseif($statisticsForm->selectInfo==3){
	$column=array(
		array( 
	      'name'=>'ID Trans',
	      'value'=> '$data->idTransaction',
	      'htmlOptions'=>array('width'=>'20px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Type',
	      'value'=> '$data->idTransactionType0->name',
	      'htmlOptions'=>array('width'=>'10px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Credits',
	      'value'=> '$data->credits',
	      'htmlOptions'=>array('width'=>'30px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Price',
	      'value'=> '$data->price',
	      'htmlOptions'=>array('width'=>'30px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Status',
	      'value'=> '$data->status',
	      'htmlOptions'=>array('width'=>'30px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Note',
	      'value'=> '$data->promoNote',
	      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
	    ),
	     array( 
	      'header'=>'Date and time',
	      'value'=> '$data->data', //insert_timestamp',
	      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
	    )
	);
}
		
$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'some-unique-id-string',
    'dataProvider'=>$dataTransactionPhoto,
    'columns'=>$column,
    'selectableRows'=>'1', // Riportare a zero per poter selezionare più opzioni <<<<<<<<<<<<
    //'summaryText'=>'',
    'enableSorting'=>true,
    'enablePagination'=>false,
	//'ajaxUpdate' => false, 
));