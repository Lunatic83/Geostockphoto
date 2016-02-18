<?php

class Histogram extends CWidget
{
	var $histogram;
	
    public function run(){
		$barwidth=1;
		$maxheight = 120;		
		$histo = json_decode($this->histogram, true);
	
		// find the maximum in the histogram in order to display a normated graph
		$max = 0;
		for ($i=0; $i<=255; $i++){
	        if ($histo["RGB"][0][$i] > $max){
	        	$max = $histo["RGB"][0][$i];
	        }
		}
		
		$this->render('histogram', array(
        	'barwidth'=>$barwidth,
        	'histo'=>$histo,
        	'maxheight'=>$maxheight,
			'max'=>$max
		));
    }
}