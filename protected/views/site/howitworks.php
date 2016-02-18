<script type="text/javascript">
	$(document).ready(function(){
		<?php if($depth==3){?>
			$('[data-img='+<?php echo $level1;?>+']').click(); window.setTimeout(function(){$('[data-img='+<?php echo $level2;?>+']').click();  window.setTimeout(function(){$('[data-img='+<?php echo $level3;?>+']').click()}, 500 ); }, 1000 );
		<?php }else if($depth==2){?>
			$('[data-img='+<?php echo $level1;?>+']').click(); window.setTimeout(function(){$('[data-img='+<?php echo $level2;?>+']').click(); }, 1000 );
		<?php }?>
	});
</script>
<div class="well margin-top-bottom background_box" style="text-align:center">
	<div class="twilight">
		<div class="img-headers">
			<img data-img="1" data-level="0" data-parent="0" src="<?php echo Yii::app()->baseUrl?>/images/photographer.jpg"/>
			<img data-img="2" data-level="0" data-parent="0" src="<?php echo Yii::app()->baseUrl?>/images/book.jpg"/>
		</div>		
		<div class="img-headers">
			<img data-img="3" data-level="1" data-parent="1" src="<?php echo Yii::app()->baseUrl?>/images/submit_en.jpg"/>
			<img data-img="4" data-level="1" data-parent="1" src="<?php echo Yii::app()->baseUrl?>/images/vote_en.jpg"/>
			<img data-img="5" data-level="1" data-parent="1" src="<?php echo Yii::app()->baseUrl?>/images/85fee_en.jpg"/>
			<img data-img="27" data-level="1" data-parent="1" src="<?php echo Yii::app()->baseUrl?>/images/eye_en.jpg"/>
		</div>
		<div class="img-headers">
			<img data-img="12" data-level="2" data-parent="3" src="<?php echo Yii::app()->baseUrl?>/images/upload.jpg"/>
			<img data-img="13" data-level="2" data-parent="3" src="<?php echo Yii::app()->baseUrl?>/images/edit_photo_en.jpg"/>
			<img data-img="14" data-level="2" data-parent="3" src="<?php echo Yii::app()->baseUrl?>/images/submit_2_en.jpg"/>
			<!-- <img data-img="15" data-level="2" data-parent="3" src="<?php echo Yii::app()->baseUrl?>/images/android.jpg"/> -->
		</div>
		<div class="img-headers">
			<img data-img="16" data-level="2" data-parent="4" src="<?php echo Yii::app()->baseUrl?>/images/vote_photo_en.jpg"/>
			<img data-img="17" data-level="2" data-parent="4" src="<?php echo Yii::app()->baseUrl?>/images/vote_photographer_en.jpg"/>
		</div>
		<div class="img-headers">
			<img data-img="18" data-level="2" data-parent="5" src="<?php echo Yii::app()->baseUrl?>/images/fee_en.jpg"/>
			<img data-img="19" data-level="2" data-parent="5" src="<?php echo Yii::app()->baseUrl?>/images/money_en.jpg"/>
		</div>
		<!-- <div class="img-headers">
			<img data-img="20" data-level="2" data-parent="6" src="<?php //echo Yii::app()->baseUrl?>/images/portfolio.jpg"/>
			<img data-img="21" data-level="2" data-parent="6" src="<?php //echo Yii::app()->baseUrl?>/images/profile.jpg"/>
			<img data-img="22" data-level="2" data-parent="6" src="<?php //echo Yii::app()->baseUrl?>/images/community.jpg"/>
		</div> -->
		<div class="img-headers">
			<img data-img="23" data-level="2" data-parent="2" src="<?php echo Yii::app()->baseUrl?>/images/buy_credits_en.jpg"/>
			<img data-img="24" data-level="2" data-parent="2" src="<?php echo Yii::app()->baseUrl?>/images/geotag_en.jpg"/>
			<img data-img="25" data-level="2" data-parent="2" src="<?php echo Yii::app()->baseUrl?>/images/download.jpg"/>
			<!-- <img data-img="26" data-level="2" data-parent="2" src="<?php //echo Yii::app()->baseUrl?>/images/community.jpg"/> -->
		</div>
		
		<div class="headers-text">
			<div class="big-title"><span style="color:black"><span class=blue>G</span>eo<span class=blue>S</span>tock<span class=blue>P</span>hoto</span> targets</div>
			<div class="sub-title"><b>GeoStockPhoto</b> offers to photographers and buyers<br>new services for selling and buying
				geotagged photos.<br>And you, which kind of user are you?
			</div>
		</div>
		<div class="text-img-big">
		</div>
		<div class="img-big">
			<img data-img="1" data-level="0" data-parent="0" style="width:290px;" src="<?php echo Yii::app()->baseUrl?>/images/photographer_big_en.jpg"/>
			<img data-img="2" data-level="0" data-parent="0" style="width:290px;" src="<?php echo Yii::app()->baseUrl?>/images/book_big_en.jpg"/>
		</div>
		
		<div class="item-text" data-item="1" >
			<div class="big-title">Freely sell your photos</div>
			<div class="sub-title">Enter the open market where you decide the licenses and prices of your photos,
				and earn up to 85% of the photo's price. Join the community where you can vote on the photos of other users
				and show yours off to everyone else.
			</div>
			<div class="img-headers">
			</div>
		</div>
		<div class="item-text" data-item="2" >
			<div class="big-title">Easily find and buy photos</div>
			<div class="sub-title">Search the photos you need in our map, use your credits how and whenever you want,
				buy the license more convenient to you (RF or RM)!
			</div>	
		</div>
		<div class="item-text" data-item="4" >
			<div class="big-title">Vote photos and photographers</div>
			<div class="sub-title"><b>GeoStockPhoto</b> introduces a new evaluation system that you can use to evaluate photos of other users
				 and, at the same time, define the level of the photographer.
			</div>				
		</div>
		<div class="item-text" data-item="5" >
			<div class="big-title">Payoff for the photographers</div>
			<div class="sub-title">With <b>GeoStockPhoto</b>, you set your photo's price. Your commission is based on your user level. Learn more
			about the requirements for each level in order to increase your income, and also how to turn credits into cash.
			</div>			
		</div>
		<!-- <div class="item-text" data-item="6" >
			<div class="big-title">Show off</div>
			<div class="sub-title">Everything you need in order to show all your photos and personal information: one map with only your photos,
				one personal page
				una pagina personale e la possibilità di rendere nota la tua posizione geografica in una mappa con tutti gli altri fotografi.
			</div>				
		</div> -->
		<div class="item-text" data-item="3" >
			<div class="big-title">Upload new photos</div>
			<div class="sub-title">You can upload, edit, save and submit more photos all at once, on the same page. 
				Submission requires you to fill out just three fields. You can modify or add extra information after the approval.
				Decide licenses and prices for your photos.
			</div>				
		</div>
		<div class="item-text" data-item="12" >
			<div class="big-title">Upload photo</div>
			<?php $this->renderPartial('howitworks/upload');?>
		</div>
		<div class="item-text" data-item="13" >
			<div class="big-title">Data, licenses and prices</div>
			<?php $this->renderPartial('howitworks/edit_photo');?>
		</div>
		<div class="item-text" data-item="14" >
			<div class="big-title">Submit photos</div>
			<?php $this->renderPartial('howitworks/submit');?>
		</div>
		<!-- <div class="item-text" data-item="15" >
			<div class="big-title">Applicazione mobile</div>
			<div class="sub-title">sub title text</div>
			<div class="text"><?php //$this->renderPartial('howitworks/mobile');?></div>
		</div> -->
		<div class="item-text" data-item="16" >
			<div class="big-title">Photo evaluation</div>
			<?php $this->renderPartial('howitworks/vote_photo');?>
		</div>
		<div class="item-text" data-item="17" >
			<div class="big-title">Photographer evaluation</div>
			<?php $this->renderPartial('howitworks/vote_photographer');?>
		</div>
		<div class="item-text" data-item="18" >
			<div class="big-title">Payoff for the photographer</div>
			<?php $this->renderPartial('howitworks/fee');?>
		</div>
		<div class="item-text" data-item="19" >
			<div class="big-title">Convert credits</div>
			<?php $this->renderPartial('howitworks/convert_credits');?>
		</div>
		<!-- <div class="item-text" data-item="20" >
			<div class="big-title">Portfolio</div>
			<?php //$this->renderPartial('howitworks/portfolio');?>
		</div>
		<div class="item-text" data-item="21" >
			<div class="big-title">Personal page</div>
			<?php //$this->renderPartial('howitworks/personal_page');?>
		</div>
		<div class="item-text" data-item="22" >
			<div class="big-title">Mappa dei fotografi</div>
			<?php //$this->renderPartial('howitworks/map_photographers');?>
		</div> -->
		<div class="item-text" data-item="23" >
			<div class="big-title">Buy credits</div>
			<?php $this->renderPartial('howitworks/buy_credits');?>
		</div>
		<div class="item-text" data-item="24" >
			<div class="big-title">Search photos</div>
			<?php $this->renderPartial('howitworks/search_photo');?>
		</div>
		<div class="item-text" data-item="25" >
			<div class="big-title">Download photos</div>
			<?php $this->renderPartial('howitworks/buy_photo');?>
		</div>
		<!-- <div class="item-text" data-item="26" >
			<div class="big-title">Ricerca fotografo</div>
			<?php //$this->renderPartial('howitworks/search_photographer');?>
		</div> -->
		<div class="item-text" data-item="27" >
			<div class="big-title">Show off</div>
			<?php $this->renderPartial('howitworks/show');?>
		</div>
	</div>
	<!-- <div style="margin-top:20px">
		<span class="orange" style="font-weight:bold">NOTE</span>: Faded icons indicate features which are still under development.<br>
		Thanks for your patience. They will be available by launch!
	</div> -->
</div>
