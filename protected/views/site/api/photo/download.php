<h5 class="darkblue"><a name="_photo/download" class="anchor">&nbsp;</a>photo/download</h5>
<b>Description</b>: returns the descriptive information of a photo.<br>
<b>Authentication</b>: required.<br>
<b>Only for partners</b>: yes.<br>
<b>Method</b>: get.<br>
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
		<td>id</td>
		<td>int</td>
		<td>existing id</td>
		<td>none</td>
		<td>yes</td>
		<td>Unique ID of the photo.</td>
	</tr>
	<tr>
		<td>idSize</td>
		<td>int</td>
		<td>valid idSize</td>
		<td>none</td>
		<td>yes</td>
		<td>Size ID of the photo. You can retrieve the possilbe dimensions by using the method
			<a href="#_photo/getConfSize">getConfSize</a>.</td>
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
		<td colspan=3>Returns the file of the photo in a Content-Type: image/jpeg.</td>
	</tr>
</table>