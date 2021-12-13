<?php  
	http_response_code(403);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Error 403, forbidden</title>
</head>
<style>
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	background: rgb(20,20,20);
}
.errorPageMSG {
	color: lightgrey;
	font-size: 30px;
	position: absolute;
	top: 45%;
	left: 50%;
	transform:translate(-50%, -50%);
	font-family: 'Maven Pro', sans-serif;
	user-select: none;opacity: 0.8;
}
</style>
<body>
	<main>
		<h3 class="errorPageMSG"><strong>Error 403, forbidden</strong></h3><center>
	</main>
</body>
</html>