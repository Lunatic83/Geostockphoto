<h5 class="darkblue"><a name="_photo/getConfCategory" class="anchor">&nbsp;</a>photo/getConfCategory</h5>
<b>Description</b>: returns the list of all categories that any photo can have on GeoStockPhoto.<br>
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
		<td colspan="6">This method does not accept any argument.</td>
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
		<td>category</td>
		<td>array</td>
		<td>List of the categories.</td>
	</tr>
	<tr>
		<td>category[idCategory]</td>
		<td>int</td>
		<td>Unique ID of each category.</td>
	</tr>
	<tr>
		<td>category[name]</td>
		<td>string</td>
		<td>Name of the category.</td>
	</tr>
</table>