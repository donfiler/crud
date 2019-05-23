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
  <h1 class="my-4 text-primary display-4">User list</h1>
    <div class="table-responsive">
    <table class="table table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>NAME</th>
        <th colspan="3">ACTION</th>
      </tr>
      </thead>
      <tbody>

<?php
try{
$con = new PDO ("mysql:host=localhost;dbname=donfaeyz_test","donfaeyz_don","ctlsts4d");  
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$select = $con->prepare("SELECT * FROM users ");

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?>

 <tr>
<td><?php echo $data['id']; ?></td>
<td><?php echo $data['email']; ?></td>
<td><?php echo $data['pass']; ?></td>
<td><?php echo $data['name']; ?></td>
<td><a href="update.php?edit_id=<?php echo $data['id']; ?>">EDIT</a></td>
<td><a class=text-danger href="delete.php?del_id=<?php echo $data['id']; ?>">DELETE</a></td>

<?php
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}

?>
</tr></table>

</body>
</html>
