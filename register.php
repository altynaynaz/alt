<html>
<head>
	<meta charset="utf-8">
	<link type = "text/css" rel = "stylesheet" href = "hello.css" />
	<script type="text/javascript" src="prototype.js"></script>
</head>
<body>
<div id = "form"><center>
<form method  = "POST">
<p>Email:  <input type="text" name="email" /> </p>
<p>Password:  <input type="text" name="password" id = "password"/> </p>
<input type = "submit" name = "okay" value = "register"/> </form>

	<?php

	$password = $_POST['password'];
	$email = $_POST['email'];
	
	
	$connect = mysql_connect("localhost", "root", "");
	mysql_select_db("hello");
	$result = mysql_query("SELECT count(*) FROM registration WHERE email='".$email."'");
	$row = mysql_fetch_row($result);
	if ($_POST['okay']){
	
		if(empty($email)) {
		echo "All fields are required";
		}
		else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) ||  (strlen(preg_replace('/\s+/', '', $password)) < 8))  {
		echo  "Invalid" ;
	}
	}
	
	if (isset($email) == true && empty($email) == false) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && (strlen(preg_replace('/\s+/', '', $password)) >= 8)) {
		if ($row[0]==0){
			$register = mysql_query("INSERT INTO registration (password, email) VALUES ('".$password."','".$email."');");
			echo '<script type="text/javascript" language="javascript">
	                    window.open("message3.php"); </script>';
			}
		else {
			echo '<script type="text/javascript" language="javascript">
	                    window.open("message2.php"); </script>';
	}
	}
	}
	}
	?>

</br></br><p><a href = "index.php"> Go back</a></p>








</center>
</div>
</body>
</html>


	















