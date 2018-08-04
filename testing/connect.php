<?php
$pdo = new PDO("mysql:host=localhost;dbname=notification", 'root', '');

if($pdo){echo "connceted";}
?>