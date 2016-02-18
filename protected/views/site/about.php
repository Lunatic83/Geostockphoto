<div class="container well margin-top-bottom gsp-txt-color background_box">
	<div id="title-about">About GeoStockPhoto</div>
	
	<div id="person" class="container">
		<div id="photo-person" style="text-align:justify; margin-right:40px">
			GeoStockPhoto is a stock photo agency for high-quality geotagged photos. Professional and hobby photographers
			can sell their photos in an online free-marketplace. Our clients include publishers, PR agencies, and anyone else
			looking to add some high-quality images to their website or print material.
			GeoStockPhoto offers both Royalty-Free and Rights-Managed licenses.
			The photographers decide licenses and prices of their photos. We are also proud to offer high
			commissions to the photographers (from 50% to 85%).<br>
			GeoStockPhoto has been boosted by <a target="_blank" href="http://www.i3p.it/">I3P</a> (the Innovative Enterprise Incubator of the Politecnico di Torino)
			since 2011 and by <a target="_blank" href="http://www.treatabit.com/">Treatabit</a> (the playground for newmedia entrepreneurs) since 2012.
		</div>
	</div>
	
	<br>
	
	<div id="person" class="container">
		<div id="photo-person"><img src='<?php echo Yii::app()->baseUrl; ?>/images/marco_profile.jpg' alt='Marco Cannizzaro Geostockphoto' width="150"/></div>
		<div id="descr-container">
			<div id="role">Marco Cannizzaro - Founder and Developer - New York City (USA)</div>
			<div id="description">
				I'm a PhD student at Politecnico di Torino (in Italy) in Electronics Engineering and
				I'm currently doing an internship at Columbia University in the City of New York.
				I got a Master's degree in Computer Science in 2010.
				I'm a newbie photographer, a microstock contributor and an enthusiastic entrepreneur.
			<div>
				<?php echo CHtml::mailto("marco@geostockphoto.com"); ?>
			</div>
			<div>
				<a target="_blank" href="http://www.linkedin.com/pub/marco-cannizzaro/30/b83/38b">Linkedin</a>
			</div>
		</div>
	</div>
	
	<br>
	
	<div id="person" class="container">
		<div id="photo-person"><img src='<?php echo Yii::app()->baseUrl; ?>/images/gaspare_profile.jpg' alt='Gaspare Scherma Geostockphoto' width="150"/></div>
		<div id="descr-container">
			<div id="role">Gaspare Scherma - CoFounder and Developer - Palermo (Italy)</div>
			<div id="description">I'm IT passionate and I started to write code when I was 12. I got my Master's Degree in Computer Science from Politecnico di Torino
				in 2009. Since then, I've been working for different companies. I decided to join GeoStockPhoto as entrepreneur,
				using my experience in order to improve the GeoStockPhoto concept.
			</div>
			<div>
				<?php echo CHtml::mailto("gaspare@geostockphoto.com"); ?>
			</div>
			<div>
				<a target="_blank" href="http://www.linkedin.com/in/gasparescherma">Linkedin</a>
			</div>
		</div>
	</div>
	
	<br>
	
	<div id="person" class="container">
		<div id="photo-person"><img src='<?php echo Yii::app()->baseUrl; ?>/images/tatiana_profile.jpg' alt='Gaspare Scherma Geostockphoto' width="150"/></div>
		<div id="descr-container">
			<div id="role">Tatiana Becker - CoFounder and COO - New York City (USA)</div>
			<div id="description">
				Though I started my career on the tech side (writing C# test code for the original TabletPC),
				I found that the human side an even bigger challenge.
				I have been running my own business for 10 years now, hold an MBA from Babson College,
				and have been working in startups - AppNexus, Etsy, and AHAlife.
			</div>
			<div>
				<?php echo CHtml::mailto("tatiana@geostockphoto.com"); ?>
			</div>
			<div>
				<a target="_blank" href="http://www.linkedin.com/in/tatianabecker">Linkedin</a>
			</div>
		</div>
	</div>
	
	<div style="text-align:justify; margin: 30px 40px 0 10px">
		<!-- <span style="color: black">Address</span>: GeoStockPhoto c/o I3P Corso Castelfidardo 30/a 10129 Torino (TO) Italy -->
		<div id='map_canvas_small' style='min-height: 300px; width: 432px; border: 1px solid black; margin: 10px 20px 0 0; float: left'></div>
		<div id='map_canvas_small_2' style='min-height: 300px; width: 432px; border: 1px solid black; margin-top: 10px; float: left'></div>
	</div>
</div>

<script type="text/javascript">
function initializeMapSmall_inPage(lat, lng, zoom, div) {
	var latlng = new google.maps.LatLng(lat, lng);
	var myOptions = {       
		zoom: zoom,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
  		streetViewControl: false,
  		scaleControl: false,
	};
	
	var mapSmall = new google.maps.Map(document.getElementById(div), myOptions);
	
	var icon = yii.urls.base+"/images/marker_s_logo.png";
	var marker = new google.maps.Marker({
		position: latlng,
		map: mapSmall,
		icon: icon,
	});
}
</script>