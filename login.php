<html>
<head>
	<meta charset="utf-8">
	<link type = "text/css" rel = "stylesheet" href = "hello.css" />
	<script type="text/javascript" src="prototype.js"></script>
</head>
<form method = "POST">
<div id = "form">
<center>

<p>Email:  <input type="text" name="email" /> </p>
<p>Password:  <input type="password" name="password" /> </p>

</p><input type = "submit" name = "okay1" value = "login"/></p> 
<?php
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	$connect = mysql_connect("localhost", "root", "");
	mysql_select_db("hello");
	
	$result1 = mysql_query("SELECT password AS _password FROM registration WHERE email='".$email."'");
	$row1 = mysql_fetch_assoc($result1);
	

if(isset($_POST['okay1'])){ 
    $_SESSION['attempts'] = file_get_contents('hello.txt'); 
    $_SESSION['attempts']++; 
    file_put_contents('hello.txt',$_SESSION['attempts']);
}
else $_SESSION['attempts'] = file_get_contents('hello.txt'); 


if ($_POST['okay1']){
		if(empty($email)) {
		echo "all fields are required";
		}
		else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) ||  (strlen(preg_replace('/\s+/', '', $password)) < 8))  {
		echo  "Invalid" ;
	}
	}
	
	if (isset($email) == true && empty($email) == false) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && (strlen(preg_replace('/\s+/', '', $password)) >= 8)) {

if ($_SESSION['attempts'] < 3) {
	if ($row1['_password'] == $password){
	$link1 = '<script type="text/javascript" language="javascript">
	window.open("message1.php"); </script>';
	echo $link1;
	file_put_contents('hello.txt',0);
}
else if ($row1['_password'] != $password) {
	echo "Incorrect password, try again!";
	}
	}
else {
	$link = '<script type="text/javascript" language="javascript">
	                    window.open("message.php"); </script>';
    echo $link;
	file_put_contents('hello.txt',0);
	}
}
}}

?>











</br></br><p><a href = "index.php"> Go back</a></p>
</center> 
</div>

</form>

</body>
</html>

