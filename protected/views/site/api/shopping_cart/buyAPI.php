<h5 class="darkblue"><a name="_shopping_cart/buyAPI" class="anchor">&nbsp;</a>shopping_cart/buyAPI</h5>
<b>Description</b>: returns the file of a photo.<br>
<b>Authentication</b>: required.<br>
<b>Only for partners</b>: yes.<br>
<b>Method</b>: post.<br>
<b>Protocol</b>: https.<br>

<table class="table table-bordered table-striped table-condensed" style="width:900px; margin-top: 10px">
	<thead class='bg_blue'>
		<tr>
			<td><b>Argument</b></td>
			<td><b>Type</b></td>
			<td style="width: 100px"><b>Valid Values</b></td>
			<td><b>Default Value</b></td>
			<td><b>Required</b></td>
			<td><b>Description</b></td>
		</tr>
	</thead>
	<tr>
		<td>cntPhotos</td>
		<td>int</td>
		<td>>= 0</td>
		<td>none</td>
		<td>yes</td>
		<td>Number of photos to buy.</td>
	</tr>
	<tr>
		<td>photos[x]</td>
		<td>Array</td>
		<td>-</td>
		<td>none</td>
		<td>yes</td>
		<td>List of the photos to buy where x is an integer between 0 and cntPhotos.</td>
	</tr>
	<tr>
		<td>photos[x]['idProduct']</td>
		<td>int</td>
		<td>existing id</td>
		<td>none</td>
		<td>yes</td>
		<td>Unique ID of the photo x.</td>
	</tr>
	<tr>
		<td>photos[x]['idSize']</td>
		<td>int</td>
		<td>existing idSize</td>
		<td>none</td>
		<td>yes</td>
		<td>Size of the photo x.</td>
	</tr>
	<tr>
		<td>photos[x]['idLicense']</td>
		<td>int</td>
		<td>existing idLicense</td>
		<td>none</td>
		<td>yes</td>
		<td>License ID of the photo x.</td>
	</tr>
	<tr>
		<td>photos[x]['price']</td>
		<td>float</td>
		<td>existing price</td>
		<td>none</td>
		<td>yes</td>
		<td>Price of the photo x.</td>
	</tr>
	<tr>
		<td>totPrice</td>
		<td>float</td>
		<td>>= 0</td>
		<td>none</td>
		<td>yes</td>
		<td>Total price to pay in order to buy all photos in the photos[] array.</td>
	</tr>
</table>

<table class="table table-bordered table-striped table-condensed" style="width:900px">
	<thead class='bg_blue'>
		<tr>
			<td><b>Returned Value</b></td>
			<td><b>Type</b></td>
			<td><b>Description</b></td>
		</tr>
	</thead>
	<tr>
		<td>errCode</td>
		<td>int</td>
		<td>000 if no errors have occurred.</td>
	</tr>
</table>