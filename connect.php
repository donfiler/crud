<?php

try{
$con = new PDO ("mysql:host=localhost;dbname=donfaeyz_test","donfaeyz_don","ctlsts4d"); 
echo "connected";
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}
