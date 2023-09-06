<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="/assets/img/favicon.png" type="image/x-icon"/>
	<link href="/assets/css/main.css" rel="stylesheet">
	<title>
		<?php
			// get app title 
			$app_title = $config->getValue("app-name")." ".$config->getValue("version"); 
			echo $app_title;
		?>
	</title>
</head>
<body>
	<main>
		<p class="title-msg"><strong>Becwork</strong></p>
		<p class="doc-msg">click -> <a href="/">home</a></p>
		<p class="doc-msg">Example route</p>
	</main>
</body>
</html>