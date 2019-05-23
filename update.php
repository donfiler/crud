<?php
try{
$con = new PDO ("mysql:host=localhost;dbname=donfaeyz_test","donfaeyz_don","ctlsts4d"); 

$edit_id = $_GET['edit_id'];


$select = $con->prepare("SELECT * FROM users where id='$edit_id' ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();
if(isset($_POST['done']))
{

$email = $_POST['email'];
$pass = $_POST['pass'];
$name = $_POST['name'];


$update = $con->prepare("UPDATE users SET email=:email ,pass=:pass, name=:name where id='$edit_id'");
$update->bindParam(':email',$email);
$update->bindParam(':pass',$pass);
$update->bindParam(':name',$name);
$update->execute();
header("location:select.php");
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


<link rel="stylesheet" type="text/css" href="reset.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">

<nav>
		<ul>
			<li><a class="active" href="insert.php">Add a User</a></li>
			<li><a href="select.php">All Users</a></li>
		</ul>
	</nav>

<div class="container">
	<h1 class="my-4 text-info display-4">Update</h1>
<form method="post">
	<input type="text" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
	<input type="text" name="pass" placeholder="*****" value="<?php echo $data['pass'] ?>">
	<input type="text" name="name" placeholder="Full Name" value="<?php echo $data['name'] ?>">
	<input class="btn-success" type="submit" name="done" >
</form>

</div>
</body>
</html>