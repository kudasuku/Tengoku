<html>
<head>
<title>DATABASE CONNECTION</title>
</head>
<body>
	<?php
	//connect to server
	$connect = mysqli_connect("localhost", "root", "", "project2");
	
	if(!$connect){
		die ('ERROR:' .mysqli_connect_error());
	}
	?>
	</body>
</html>