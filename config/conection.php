<?php

    $host = "localhost";
    $dbname = "curso";
    $user = "root";
    $pass = "";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        //echo "Conectado com sucesso!";
    }catch(PDOException $e){
        die ("Erro!" . $e->getMessage());   
    }
      
?>