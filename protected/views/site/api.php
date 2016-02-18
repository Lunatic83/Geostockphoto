<div class="container margin-top-bottom">
	<div class="well background_box" style="text-align: justify">
		<h1>GeoStockPhoto API</h1>
		GeoStockPhoto offers to all registered users the
		opportunity to interact with its database, through the API described in this document.
		All registered users can use them under the <a
		href="http://www.geostockphoto.com/general-terms">Terms and Conditions for the use
		of GeoStockPhoto</a>.
		
		<div class="alert in alert-error" style="margin-top: 10px">
			GeoStockPhoto's API is under development.<br>
			You can freely use all functions and test them, taking into account that they may change at any time and without notice.
		</div>
		
		<h5><a name="loadMap" class="anchor">&nbsp;</a>Load GeoStockPhoto Map</h5>
		GeoStockPhoto offers you an <b>easy</b> way to load our map on your website.<br>
		<?php echo CHtml::link(
			  'Click here to know more.',
			  Yii::app()->createUrl('/loadMap')
		);?>
		
		<h5>API key</h5>
		<?php
		if(!Yii::app()->user->isGuest){
			if(Yii::app()->user->apiKey){
				echo "Your API key is: <b>".Yii::app()->user->apiKey."</b>";
			}else{
				echo "Before using the API, you must request an API key by sending us the following form:";
				$form=$this->beginWidget('CActiveForm', array(
					'id'=>'apikey-form',
					'enableAjaxValidation'=>true,
					'htmlOptions'=>array(
				        'style'=>'margin-top: 10px'
				    )
				));
				?>
					<div style="margin-bottom: 10px; text-align: left">
						<?php echo $form->textField($modelApiKey,'link1',array('placeholder'=>"URL of your website", 'maxlength'=>128, 'class'=>'span3', 'style'=>'margin-left: 0px')); ?><br>
						<!-- Accept <?php //echo CHtml::link('Terms and Conditions', Yii::app()->createUrl('/youdonothing-terms'));?>
							<?php //echo $form->checkBox($modelYoudonothing,'acceptTerms',array('style'=>'margin-top:0px')); ?> -->
					<?php
						echo CHtml::ajaxSubmitButton(
							"Send Request",
							array('site/sentApiRequest'),
							array('beforeSend' => "js:function(){document.getElementById('msg_error').style.display='none';}",
								'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('site/api')."', 'msg_error', 'null')}"
							),
							array('class'=>'btn btn-primary btn-small')
						);
					?>
					</div>
					<div id="msg_error" class="alert in alert-error" style="display:none"></div>
					
				<?php $this->endWidget();
			}
		}else{
			echo "Before using the API, you must 
			<a href='".Yii::app()->createAbsoluteUrl('site/login')."'>login</a>
			and come back to this page in order to request your API key.";
		}?>
		
		
		<h5>Query and result formats</h5>
		The GeoStockPhoto API is a REST API which is available
		via HTTP requests. The base URL for the API is http(s)://geostockphoto.com/. Read-only
		methods (those that are called using GET) may also be called by URL. <b>Remember</b>: you must always sent your API
		key in the <b><i>apiKey</i></b> argument of the HTTP
		request.<br>
		For example, the method ''photo/getSearch''
		returns the last submitted 100 photos with the highest rate and you can access
		it with the following URL:
		<b>
			http://geostockphoto.com/photo/getSearch/apiKey/&lt;yourApiKey&gt;
		</b><br>
		where you need to replace the <i>&lt;yourApiKey&gt;</i> with your personal API
		key.<br>
		All return values are given in a json format.
		
		<h5>Error codes</h5>
		If something goes wrong during an API request, the return value (always in a json format)
		is an <i>errCode</i> variable. The following table lists all his possible values and their meaning.
		<div style="margin: 20px 120px 0px 120px">
			<table class="table table-bordered table-striped table-condensed" style="width:700px">
			 <thead class='bg_blue'>
				 <tr>
				  <td><b>ErrCode</b></td>
				  <td><b>Description</b></td>
				 </tr>
			 </thead>
			 <tr>
			  <td>000</td>
			  <td>No errors.</td>
			 </tr>
			 <tr>
			  <td>001</td>
			  <td>Your API key is missing or not valid.</td>
			 </tr>
			 <tr>
			  <td>002</td>
			  <td>The API request could not find any result.</td>
			 </tr>
			 <tr>
			  <td>003</td>
			  <td>Not authorized to perform this action.</td>
			 </tr>
			</table>
		</div>
		
		<h5>Authentication</h5>
		Some methods need to be authenticated with a process
		similar to the login of the GeoStockPhoto website. After authentication,
		GeoStockPhoto provides a session ID.
		<b>Remember</b>: you must always sent your session ID
		in the <b><i>SECURE_SESSION_ID</i></b> argument of the
		requests which require authentication.<br>
		
		<h5>Partners</h5>
		Some methods are available only for GeoStockPhoto
		partners. You can apply for being one of our partner by sending an email to <a
		href="mailto:info@geostockphoto.com">info@geostockphoto.com</a>.
		Our team will evaluate your request and, if it is accepted, you can
		immediately start using all methods reserved to our partners.
		
		<h5>Methods list</h5>
		The following table lists all methods available in the
		GeoStockPhoto API.
		
		<div style="margin: 20px 20px 0px 20px">
			<table class="table table-bordered table-striped table-condensed" style="width: 100%">
			<thead class='bg_blue'>
				<tr>
					<td><b>Function</b></td>
					<td style="width: 50px"><b>Only for Partners</b></td>
					<td style="width: 50px"><b>Auth. required</b></td>
					<td><b>Method</b></td>
					<td><b>Protocol</b></td>
					<td><b>Description</b></td>
				</tr>
			</thead>
			<tr>
				<td class="bg_orange" colspan="6">The following methods are related to our Photos
					(prepend <b>photo/</b> in order to use them).</td>
			</tr>
			<tr>
				<td><!-- <a href="#_photo/download"> -->downloadAPI<!-- </a> --></td>
				<td>yes</td>
				<td>yes</td>
				<td>get</td>
				<td>https</td>
				<td>Returns the file of the photo (no json format).
					The photo should have already been bought from the partner.</td>
			</tr>
			<tr>
				<td><a href="#_photo/getConfCategory">getConfCategory</a></td>
				<td>no</td>
				<td>no</td>
				<td>get</td>
				<td>http</td>
				<td>Returns the list of all categories that any photo can have on GeoStockPhoto.</td>
			</tr>
			<tr>
				<td><a href="#_photo/getConfSize">getConfSize</a></td>
				<td>no</td>
				<td>no</td>
				<td>get</td>
				<td>http</td>
				<td>Returns the list of all sizes that any photo can have on GeoStockPhoto.</td>
			</tr>
			<tr>
				<td><a href="#_photo/getInfo">getInfo</a></td>
				<td>no</td>
				<td>no</td>
				<td>get</td>
				<td>http</td>
				<td>Returns the descriptive information of a photo.</td>
			</tr>
			<tr>
				<td><a href="#_photo/getSearch">getSearch</a></td>
				<td>no</td>
				<td>no</td>
				<td>get</td>
				<td>http</td>
				<td>Returns the photos available for sales with full
				search capabilities.</td>
			</tr>
			<!-- <tr>
				<td>getShootInfo</td>
				<td>no</td>
				<td>no</td>
				<td>get</td>
				<td>http</td>
				<td>Returns the shooting information of a photo.</td>
			</tr> -->
			<tr>
				<td class="bg_orange" colspan="6">The following methods are related to our Shopping Cart
					(prepend <b>shopping_cart/</b> in order to use them).</td>
			</tr>
			<tr>
				<td>buyAPI</td>
				<td>yes</td>
				<td>yes</td>
				<td>post</td>
				<td>https</td>
				<td>Buy one or more photos.</td>
			</tr>
			<tr>
				<td><a href="#_shopping_cart/getShoppingOptions">getShoppingOptions</a></td>
				<td>yes</td>
				<td>no</td>
				<td>get</td>
				<td>http</td>
				<td>Get shopping options of one photo.</td>
			</tr>
			<tr>
				<td class="bg_orange" colspan="6">The following methods are related to our Site
					(prepend <b>site/</b> in order to use them).</td>
			</tr>
			<tr>
				<td><a href="#_site/getLoginChallenge">getLoginChallenge</a></td>
				<td>yes</td>
				<td>no</td>
				<td>get</td>
				<td>https</td>
				<td>Request the challenge string needed in order to login.</td>
			</tr>
			<tr>
				<td><a href="#_site/loginAPI">loginAPI</a></td>
				<td>yes</td>
				<td>no</td>
				<td>post</td>
				<td>https</td>
				<td>Login to GeoStockPhoto and get the session ID required to perform functions reserved to authenticated users.</td>
			</tr>
			</table>
		</div>
		
		
		<hr>
		<h1>Methods description</h1>
		<?php //$this->renderPartial('api/photo/download');?>
		<?php $this->renderPartial('api/photo/getConfCategory');?>
		<?php $this->renderPartial('api/photo/getConfSize');?>
		<?php $this->renderPartial('api/photo/getInfo');?>
		<?php $this->renderPartial('api/photo/getSearch');?>
		<?php //$this->renderPartial('api/shopping_cart/buyApi');?>
		<?php $this->renderPartial('api/shopping_cart/getShoppingOptions');?>
		<?php $this->renderPartial('api/site/getLoginChallenge');?>
		<?php $this->renderPartial('api/site/loginAPI');?>
	</div>
</div>