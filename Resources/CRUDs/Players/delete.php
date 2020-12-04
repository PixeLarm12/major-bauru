<?php

    session_start();
    
    include "../../Database/connection.php";  

    $id = $_POST['id'];

    $sql = "UPDATE players SET excluded = 1 WHERE id = :id";

    $params = [
        'id' => $id,        
    ];
    
    $query = $db->prepare($sql);

    try
    {
        $query->execute($params);
        header('Location: welcome.php');
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }