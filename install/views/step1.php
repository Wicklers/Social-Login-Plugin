<h1>Step 1 - Server Configuration</h1>
<div id="column-right">
	<ul>
		<li>
			Introduction
		</li>
		<li>
			<b>Server Configuration</b>
		</li>
		<li>
			Facebook Application
		</li>
		<li>
			Finished
		</li>
	</ul>
</div>
<div id="content">
    <div id="loading"></div>
	<div class="warning" id="warning"></div>
	<form id="step1">
		<p>
			<b>Please enter your database connection details.</b>
		</p>
		<fieldset>
			<table class="form">
				<tr>
					<td><span class="required">*</span> Database Host:</td>
					<td>
					<input type="text" name="db-server"/>
					<br />
					</td>
				</tr>
				<tr>
					<td><span class="required">*</span> User:</td>
					<td>
					<input type="text" name="db-username"/>
					<br />
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
					<input type="text" name="db-password"/>
					</td>
				</tr>
				<tr>
					<td><span class="required">*</span> Database Name:</td>
					<td>
					<input type="text" name="db-name"/>
					<br />
					</td>
				</tr>
				<tr>
					<td><span class="required">*</span> Database Table Name:</td>
					<td>
					<input type="text" name="db-table"/>
					<br />
					</td>
				</tr>
			</table>
		</fieldset>
		<div class="buttons">
			<div class="left">
				<a href="?path=introduction" class="button">Back</a>
			</div>
			<div class="right">
				<input type="submit" value="Continue" class="button" />
			</div>
		</div>
	</form>
</div>