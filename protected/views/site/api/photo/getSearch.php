<h5 class="darkblue"><a name="_photo/getSearch" class="anchor">&nbsp;</a>photo/getSearch</h5>
<b>Description</b>: returns the photos available for sales with full search capabilities.<br>
<b>Authentication</b>: not required.<br>
<b>Only for partners</b>: no.<br>
<b>Method</b>: get.<br>
<b>Protocol</b>: http.<br>

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
	<tr style='mso-yfti-irow:1;page-break-inside:avoid'>
		<td>idCategory</td>
		<td>int</td>
		<td>valid idCategory</td>
		<td>none</td>
		<td>no</td>
		<td>Search by category of the photos. You can retrieve the possible categories by using the method
			<a href="#_photo/getConfCategory">getConfCategory</a>.</td>
	</tr>
	<tr>
		<td>idSize</td>
		<td>int</td>
		<td>valid idSize</td>
		<td>1</td>
		<td>no</td>
		<td>Search by minimum dimension of the photos. You can retrieve the possilbe dimensions by using the method
			<a href="#_photo/getConfSize">getConfSize</a>.</td>
	</tr>
	<tr>
		<td>lat_NE</td>
		<td>float</td>
		<td>-85 to 85</td>
		<td>85</td>
		<td>no</td>
		<td>Latitude of the North-East corner of the
		geographical region you want to search the photos.</td>
	</tr>
	<tr>
		<td>lat_SW</td>
		<td>float</td>
		<td>-85 to 85</td>
		<td>-85</td>
		<td>no</td>
		<td>Latitude of the South-West corner of the
		geographical region you want to search the photos.</td>
	</tr>
	<tr>
		<td>limit</td>
		<td>int</td>
		<td>1 to 250</td>
		<td>100</td>
		<td>no</td>
		<td>Maximum number of photos resulted.</td>
	</tr>
	<tr>
		<td>lng_NE</td>
		<td>float</td>
		<td>-180 to 180</td>
		<td>180</td>
		<td>no</td>
		<td>Longitude of the North-East corner of the
		geographical region you want to search the photos.</td>
	</tr>
	<tr>
		<td>lng_SW</td>
		<td>float</td>
		<td>-180 to 180</td>
		<td>-180</td>
		<td>no</td>
		<td>Longitude of the South-West corner of the
		geographical region you want to search the photos.</td>
	</tr>
	<tr>
		<td>rate</td>
		<td>int</td>
		<td>1 to 5</td>
		<td>1</td>
		<td>no</td>
		<td>Search by minimum rate of the photos.</td>
	</tr>
	<tr>
		<td>thumb</td>
		<td>string or int</td>
		<td><ul style="margin-bottom: 0px"><li>120</li><li>430</li><li>circle</li></ul></td>
		<td>none</td>
		<td>no</td>
		<td><ul style="margin-bottom: 0px"><li>get the source of the 120px thumb</li> 
		<li>get the source of the 430px thumb</li>
		<li>get the source of the circle thumb</li></ul></td>
	</tr>
	<tr>
		<td>user</td>
		<td>string</td>
		<td>existing username</td>
		<td>none</td>
		<td>no</td>
		<td>Search by author of the photos.</td>
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
		<td>count</td>
		<td>int</td>
		<td>Number of photos given in the <i>photo</i> array.</td>
	</tr>
	<tr>
		<td>photo</td>
		<td>array</td>
		<td>List of the resulted photos.</td>
	</tr>
	<tr>
		<td>photo[id]</td>
		<td>int</td>
		<td>Unique ID of the photo.</td>
	</tr>
	<tr>
		<td>photo[lat]</td>
		<td>float</td>
		<td>Latitude of the photo.</td>
	</tr>
	<tr>
		<td>photo[lng]</td>
		<td>float</td>
		<td>Longitude of the photo.</td>
	</tr>
	<tr>
		<td>photo[src]</td>
		<td>string</td>
		<td>Source of the thumbnail (if requested).</td>
	</tr>
</table>