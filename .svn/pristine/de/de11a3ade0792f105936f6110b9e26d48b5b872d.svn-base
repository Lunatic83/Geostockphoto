<h1 class="logo"><a href="<?php echo Yii::app()->createUrl('photo/test');?>"></a></h1>

<!-- <div class="search">
	<label>I Need &nbsp;<input type="text" id="kids" name="kids" placeholder="Kids"></label>
	<label>In &nbsp;<input type="text" id="location" name="location" placeholder="Africa"></label>
	<div class="search-btn-group">
		<a href="javascript:void(0);" class="search-btn" rel="nofollow"></a>
		<div class="advanced-search">
			<a href="javascript:void(0);" class="advanced-btn" rel="nofollow"></a>
			<div id="advanced_search" class="advanced">
				<div id="search-stars" class="search-stars">
					<a href="javascript:void(0);" class="star"></a>
					<a href="javascript:void(0);" class="star"></a>
					<a href="javascript:void(0);" class="star"></a>
					<a href="javascript:void(0);" class="star"></a>
					<a href="javascript:void(0);" class="star"></a>
					<input type="hidden" id="search_stars_val" value="3">
				</div>
				<p>3 Stars or More</p>
				<p>Size</p>

				<div class="range-ghost">
					<div id="search_range" class="noUiSlider"></div>
				</div>
				<div class="cb"></div>

				<p>Medium Size or Larger</p>
				
			</div>
		</div>
	</div>
</div> -->

<form class="pull-left" action="" style="margin-left: 20px">
	<input style="margin-bottom: 0" id="search-input" type="text" class="span3"  autocomplete="off" placeholder="Search location..." onkeypress="return submitenter(event, codeAddressIndex, this.value, 0)" onclick="togglePopover()">
	<!-- <a id="advanced-search" data-title="Advanced Search'.$htmlClose.'" data-content="'. str_replace("\"", "'",$this->render("advanced-search", array('idPhotoType'=>$idPhotoType,'user'=>$user),true)).'" data-placement="bottom" rel="popover" data-original-title="" data-html="true" style="">
	<img src="'.Yii::app()->baseUrl.'/images/transparent.png"></a> -->
</form>

<!-- <a class="user-action action-btn vote" id="vote-btn" href="javascript:void(0);" rel="nofollow" style="float:left;">Votes</a> -->

<div class="user-links">
	<?php if(Yii::app()->user->isGuest){?>
		<a href="<?php echo Yii::app()->createUrl('site/loginNew');?>" class="btn" rel="nofollow">Login</a>
		<!-- <a href="javascript:void(0);" class="btn" rel="nofollow">Photographers</a> -->
	<?php }else{ ?>
		<div class="user">
			<!-- <a class="user-action action-btn vote" href="#" rel="nofollow">Vote</a> -->
			<a class="user-action username" href="<?php echo Yii::app()->createUrl('user/view')."/".Yii::app()->user->username;?>">
				<?php echo Yii::app()->user->username?>
			</a>
			<!-- <a class="user-action action-btn settings" href="#" rel="nofollow"></a> -->
			<a class="user-action action-btn logout" href="<?php echo Yii::app()->createUrl('site/logout');?>" rel="nofollow"></a>
		</div>
	<?php }?>
</div>