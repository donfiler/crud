<!DOCTYPE html>
<html>
<head>
    <title>CRUD Insert</title>
</head>
<body>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" type="text/css" href="style.css">

<?php

try{
$con = new PDO ("mysql:host=localhost;dbname=donfaeyz_test","donfaeyz_don","ctlsts4d");  

if(isset($_POST['done']))
{

$email = $_POST['email'];
$pass = $_POST['pass'];
$name = $_POST['name'];


$insert = $con->prepare("INSERT INTO users (email,pass,name) VALUES(:email,:pass,:name)");
$insert->bindParam(':email',$email);
$insert->bindParam(':pass',$pass);
$insert->bindParam(':name',$name);
$insert->execute();
echo "Add User";
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}
?>


	<nav>
		<ul>
			<li><a class="active" href="insert.php">Add a User</a></li>
			<li><a href="select.php">All Users</a></li>
		</ul>
	</nav>

<div class="container">
	<h1 class="my-4 text-success display-4">Insert New User</h1>
		<table class="table table-striped">
			<form method="post">
			<div class="form-row">
    			<div class="col">
				<input type="email" class="form-control" name="email" placeholder="Email"></div>
				<div class="col">
				<input type="text" class="form-control" name="pass" placeholder="Password"></div>
				<div class="col">
				<input type="text" class="form-control" name="name" placeholder="First & Last Name"></div>
				<div class="col">
				<input class="btn-success" type="submit" name="done" >
			</div>
			</form>
		</table>
</div>




</body>
</html>

