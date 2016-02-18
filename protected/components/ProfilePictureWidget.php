<?php 

	class ProfilePictureWidget extends CWidget {
		public $idUser = -1;
		public $profilePictures = 1;
		
		public function run(){
			$random = rand(1, $this->profilePictures);
			
			// Add JS
			
		// <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
		
			$cs = Yii::app()->getClientScript();
			
			$cs->registerCSSFile(Yii::app()->baseUrl.'/js/nivo-slider/nivo-slider.css', 'screen');
			$cs->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js', CClientScript::POS_HEAD); 
			$cs->registerScriptFile(Yii::app()->baseUrl.'/js/nivo-slider/jquery.nivo.slider.pack.js', CClientScript::POS_HEAD);
			
			//$pictureName = 'photos/profile/'.$this->idUser.'_'.$random.'.jpg';
			//echo '<div id="ProfilePicture">   
			//	     <img src="'.$pictureName.'" width="200" height="200" alt="Profile Picture" />
			//	  </div>';
			
			$pictureName1 = 'photos/profile/'.$this->idUser.'_1.jpg';
			$pictureName2 = 'photos/profile/'.$this->idUser.'_2.jpg';
			$pictureName3 = 'photos/profile/'.$this->idUser.'_3.jpg';  
			  echo '
						<div style="width:200px" id="slider">
						    <a href="changepic.com"><img src="'.$pictureName1.'" alt="" title="#htmlcaption" /></a>
						    <img src="'.$pictureName2.'" alt="" title="This is one of your profile pictures" />
						    <a href="changepic.com"><img src="'.$pictureName3.'" alt="" title="#htmlcaption2" /></a>
						</div>
						<div id="htmlcaption" class="nivo-html-caption">
						    <strong>This</strong> is another profile picture selected by <a href="#content">you!</a>.
						</div>
						<div id="htmlcaption2" class="nivo-html-caption">
						    Click on this picure to change your profile pictures, <strong>editing your profile</strong>.
						</div>
						
						';


			echo '<script type="text/javascript">
					$(window).load(function() {
					    $("#slider").nivoSlider();
					});
					</script>';
		}

	}
	
?>