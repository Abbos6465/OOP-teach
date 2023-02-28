<?php
    require_once "autoload.php";

   $database = new Database("localhost",'oop-teach','root','root');
   $pdo=$database->connect(); 
   Post::$pdo=$pdo;
?>