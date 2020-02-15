<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>DEV MODE</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/errors/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
