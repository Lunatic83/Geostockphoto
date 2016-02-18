<div id="user-menu">
    <img class="left" src="<?php echo Yii::app()->baseUrl?>/images/user.png" width="18" height="18" alt="user">
    <label class="left"><a href="<?php echo Yii::app()->createUrl('user/view', array('id'=>Yii::app()->user->id))?>"><?php echo $user->username?></a></label>
    <ul class="left">
        <li>|</li>
        <li><a href="<?php echo Yii::app()->createUrl('photo/purchased')?>">Purchased photos</a></li>
        <li>|</li>
        <li><a href="#">Statistics</a></li>
        <li>|</li>
        <li><a href="<?php echo Yii::app()->createUrl('site/logout')?>">Logout</a></li>
    </ul>
    <ul class="right">
    	<li class="c-button"><?php echo $user->credits?></li>
        <li class="basket-green"><?php echo $countSC?></li>
    </ul>
</div>

<div id="photo-bar">
	<ul class="left">
    	<li class="p-button"><?php echo $countP?></li>
        <li class="s-button"><?php echo $user->submitBonus?></li>
    </ul>
	<img class="right" src="<?php echo Yii::app()->baseUrl?>/images/photo.png" width="18" height="18" alt="photo">
    <label class="right"><?php echo $user->idUserProfile0->name?></label>
	<ul class="right">
    	<li><a href="<?php echo Yii::app()->createUrl('portfolio/'.Yii::app()->user->name)?>">Portfolio</a></li>
        <li>|</li>
        <li><a href="<?php echo Yii::app()->createUrl('photo/submit')?>">Submit photos</a></li>
        <li>|</li>
        <li><a href="<?php echo Yii::app()->createUrl('photo/vote')?>">Make review</a></li>
        <li>|</li>
        <!--<li><a href="#">status photos</a></li>
        <li>|</li>-->
    </ul>
</div>