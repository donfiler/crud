<?php

try{
$con = new PDO ("mysql:host=localhost;dbname=donfaeyz_test","donfaeyz_don","ctlsts4d");  

$del_id = $_GET['del_id'];


$DELETE = $con->prepare("DELETE FROM users  where id='$del_id'");
$DELETE->execute();
header("location:select.php");



}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}

?>