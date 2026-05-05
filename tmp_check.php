<?php
$host='localhost';
$user='Admin1';
$pass='123698745';
$db='fastfood';
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){ echo 'CONNERR:'.$conn->connect_error; exit(1); }
$res=$conn->query('SHOW CREATE TABLE `order_item`');
if(!$res){ echo 'ERR:'.$conn->error; exit(1); }
$row=$res->fetch_assoc();
echo $row['Create Table'];
