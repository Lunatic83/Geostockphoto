<?php

class Util{
      
      public static function getVerificationCode(){
      	$length = 10;
      	
      	$characters = "0123456789abcdefghijklmnopqrstwxyuvz";
		$string = "";
		
		for ($p=0; $p < $length ; $p++) { 
			$string .= $characters[mt_rand(0,strlen($characters)-1)];
		}
		
		return $string;
      }

	  public static function getChallengeWord(){
      	$length = 512;
      	
      	$characters = "0123456789abcdefghijklmnopqrstwxyuvz";
		$string = "";
		
		for ($p=0; $p < $length ; $p++) { 
			$string .= $characters[mt_rand(0,strlen($characters)-1)];
		}
		
		return $string;
      	//return $this->getRandomString($length);
      }
      
      public static function getCurrentTime(){
	  	return date('Y-m-d H:i:s', time());
	  }
	  
	  public static function processParamsJsonAutocomplete($tableSource, $field, $condition=''){
		
		$input = strtolower(Yii::app()->request->getParam('input'));
		//Elimino il segno '=' che viene inserito nell'url
		$input = substr($input, 1);

		$criteria=new CDbCriteria;
		// $condition = $field." REGEXP '^".$input."' ".$condition; //MYSQL
		// $condition = $field." like '^".$input."' ".$condition; //MSSQL
		$condition = $field." like '".$input."%' ".$condition; //MSSQL
		//echo $condition.'<br>';
		$criteria->condition=$condition;
		$criteria->limit=6;
		$dataProviderDictionary = new CActiveDataProvider($tableSource, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>6)
		));
		$items=$dataProviderDictionary->getData();
		//echo count($items).'<br>';
		/*$items=$tableSource::model()->findAll($criteria);*/ //NON funziona in DEV :-O
		
		$len = strlen($input);
		$limit = Yii::app()->request->getParam('limit');
		
		$limit = $limit ? $limit : 0;
	
	
		$aResults = array();
		$count = 0;
	
		if ($len)
		{
			for ($i=0;$i<count($items);$i++)
			{
				// had to use utf_decode, here
				// not necessary if the results are coming from mysql
				if (strtolower(substr(utf8_decode($items[$i][$field]),0,$len)) == $input)
				{
					$count++;
					$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($items[$i][$field])); //, "info"=>htmlspecialchars($aInfo[$i]) );
				}
				
				if ($limit && $count==$limit)
					break;
			}
		}
		
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
		header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header ("Pragma: no-cache"); // HTTP/1.0
		
		header("Content-Type: application/json");
	
		echo "{\"results\": [";
		$arr = array();
		
		for ($i=0;$i<count($aResults);$i++)
		{
			$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\"}"; //, \"info\":\"".$matches[$i]['info']."\"}";
		}
		echo implode(", ", $arr);
		echo "]}";
	}

	
	function shortlabel($string, $limit=20){
		 // Return early if the string is already shorter than the limit
	    if(strlen($string) < $limit) {return $string;}
		return substr($string,0,$limit). " ..."; 
	}
}