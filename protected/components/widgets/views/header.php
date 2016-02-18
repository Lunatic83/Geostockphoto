<div class="wrapper-header"> 
<?php 
    $htmlLogo="<img src='".Yii::app()->baseUrl."/images/geostockphoto_logo_small-noClaim.png' alt='logo_geostockphoto' style='height:58px; margin: 2px 20px 2px 0;'>";
    
    if((!Yii::app()->user->isGuest) && (strlen(Yii::app()->user->name)>20)){
    	$username =	substr(Yii::app()->user->name,0,20).'...';
    }else{
    	$username = Yii::app()->user->name;
    }
    
    if(Yii::app()->user->isGuest)
    	$register_link='<a class="btn btn-warning btn-large" style="margin-top: 10px; float: right" href="'.Yii::app()->createUrl('user/create').'">Register FREE</a>';
    else 
    	$register_link="";
    
    if($this->route!='photo/index'){ $redirect=1;} else{$redirect=0;}

    if(Yii::app()->language=='it_it')
		$howitworksLabel='Come funziona!';
	else
		$howitworksLabel='How it works!';
    
    $htmlClose="<img class='close' src='".Yii::app()->baseUrl."/images/close.png' width='15' height='15' alt='close' onclick='togglePopover()'' >";
    $this->widget('bootstrap.widgets.TbNavbar', array(
	    'type'=>'inverse', // null or 'inverse'
	    //'brand'=>'Geostockphoto',
	    'brand'=> $htmlLogo,
	    'brandUrl'=>Yii::app()->createUrl('photo/map'),
	    //'collapse'=>true, // requires bootstrap-responsive.css
	    'fluid'=>true,
		'fixed'=>false,
	    'items'=>array(
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            //'items'=>array('---'),
	            'htmlOptions'=> array('style'=>'padding-top:10px;'),
	        ),
	        '<form class="navbar-search pull-left" action="" style="padding-top:9px;">
  				<input id="search-input" type="text" class="span3"  autocomplete="off" placeholder="Search location..." onkeypress="return submitenter(event, codeAddressIndex, this.value, '.$redirect.')" onclick="togglePopover()">
				<a id="advanced-search" data-title="Advanced Search'.$htmlClose.'" data-content="'. str_replace("\"", "'",$this->render("advanced-search", array('idPhotoType'=>$idPhotoType,'user'=>$user),true)).'" data-placement="bottom" rel="popover" data-original-title="" data-html="true" style="">
				<img src="'.Yii::app()->baseUrl.'/images/transparent.png"></a>        		 
	      	</form>
	        <a class="pull-left btn" style="margin-top: 15px" class="btn" onClick="js: submitPostEnter(codeAddressIndex, '.$redirect.', document.getElementById(\'search-input\').value)">GO!</a>',
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'htmlOptions'=>array('style'=>'padding: 10px 0 0 0;'),
	            'items'=>array(
	        		array('label'=>'My Photos', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
	                	array('label'=>'Purchased', 'url'=>Yii::app()->createUrl('photo/purchased')),
	                	array('label'=>'Portfolio', 'url'=>Yii::app()->createUrl('portfolio/'.$username)),
	                	array('label'=>'Upload', 'url'=>Yii::app()->createUrl('photo/submit')),
	                    array('label'=>'Status', 'url'=>Yii::app()->createUrl('photo/status')),
	                )),
                    array('label'=>'Vote', 'url'=>Yii::app()->createUrl('photo/vote'), 'visible'=>!Yii::app()->user->isGuest),
	        		array('label'=>$howitworksLabel, 'url'=>Yii::app()->createUrl('/howitworks'), 'visible'=>Yii::app()->user->isGuest),
	            ),
	        ),
			$register_link,
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'htmlOptions'=>array('class'=>'pull-right','style'=>'padding-top:10px;'),
	            'items'=>array(
	                array('label'=>'Login', 'url'=>Yii::app()->createUrl('site/login'),'visible'=>Yii::app()->user->isGuest),
	                array('label'=>$username, 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
	                    array('label'=>'My Profile', 'url'=>Yii::app()->createUrl('user/view').'/'.$username),
	                    array('label'=>'Shopping Cart', 'url'=>Yii::app()->createUrl('shopping_cart/index')),
	                    array('label'=>'Statistics', 'url'=>Yii::app()->createUrl('user/statistics')),
	                    array('label'=>'Admin', 'url'=>'#', 'visible'=>Yii::app()->user->isAdministrator(), 'items'=>array(
		                    array('label'=>'Approve Job', 'url'=>Yii::app()->createUrl('photo/cronjobapprovephoto')),
		                    array('label'=>'Report', 'url'=>Yii::app()->createUrl('site/report')),
		                    array('label'=>'Pilot Users', 'url'=>'#', 'items'=>array(
		                    	array('label'=>'Admin', 'url'=>Yii::app()->createUrl('userpilot/admin')),
		                    	array('label'=>'Create', 'url'=>Yii::app()->createUrl('userpilot/create'))
		                    )),
		                    array('label'=>'Report Reviews', 'url'=>Yii::app()->createUrl('photo/checkreviews')),
			                $switchItems,
		                    //array('label'=>'Report Author', 'url'=>Yii::app()->createUrl('photo/reportauthor'), 'visible'=>$visibleReportAuthor),
		                    //array('label'=>'Report Editor', 'url'=>Yii::app()->createUrl('photo/reporteditor'), 'visible'=>$visibleReportEditor)
		                )),
	                    array('label'=>'Logout', 'url'=>Yii::app()->createUrl('site/logout')),
	                )),
	            ),
	        ),
	    ),
	)); 
?>
</div>

