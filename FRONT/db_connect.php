<?php
$servername = "localhost";
$username = "admin";
$password = "Afpa1234";
$dbname = "thedistrict";
    try 
    {
        $db = new PDO("mysql:host=$servername;charset=utf8;dbname=$dbname", "$username", "$password");
    
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    }   
?>