<h5 class="darkblue"><a name="_site/getLoginChallenge" class="anchor">&nbsp;</a>site/getLoginChallenge</h5>
<b>Description</b>: request the challenge string needed in order to login.<br>
<b>Authentication</b>: not required.<br>
<b>Only for partners</b>: no.<br>
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
		<td>username</td>
		<td>string</td>
		<td>existing username or email</td>
		<td>none</td>
		<td>yes</td>
		<td>Username or email of the user requesting the challeng string.</td>
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
		<td>username</td>
		<td>string</td>
		<td>Username of the user requesting the challeng string.</td>
	</tr>
	<tr>
		<td>challenge</td>
		<td>string</td>
		<td>Challenge string needed as input of the <a href="#_site/loginAPI">loginAPI</a> function.</td>
	</tr>
</table>