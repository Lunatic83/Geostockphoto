<?php
 
class Footer extends CWidget
{
	var $footer_class;
	var $margin_top=null;
    public function run(){
		/*$countP=Product::model()->count();
		
		$minTime = time() - 604800;
		$minTime=Yii::app()->dateFormatter->format(
			'yyyy-MM-dd HH:mm:ss',
			$minTime
		);
		$criteria=new CDbCriteria;
		$criteria->condition="insert_timestamp >= '".$minTime."'";
		$countPWeek=Product::model()->count($criteria);*/
    	
    	$this->render('footer', array(/*'countP'=>$countP,'countPWeek'=>$countPWeek, */'footer_class'=>$this->footer_class, 'margin_top'=>$this->margin_top));
    }
}