<?php 
$title = 'DEV MODE';
include 'header.php';
?>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>DEV</h1>
			</div>
			<h2>Error info:</h2>
			<table class="table">
				<tr>
					<td><b>Code:</b></td>
					<td><?=$errno?></td>
				</tr>
				<tr>
					<td><b>Text:</b></td>
					<td><?=$errstr?></td>
				</tr>
				<tr>
					<td><b>File:</b></td>
					<td><?=$errfile?></td>
				</tr>
				<tr>
					<td><b>Line:</b></td>
					<td><?=$errline?></td>
				</tr>
			</table>
			<a href="/">Go To Homepage</a>
		</div>
	</div>

	<?php include 'footer.php'; ?>
