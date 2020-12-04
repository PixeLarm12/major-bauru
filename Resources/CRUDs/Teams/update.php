<?php

    session_start();
    
    include "../../../Database/connection.php";  

    $id = $_SESSION['idTeam'];
    $name = $_POST['name'];

    $sql = "UPDATE teams SET name = :name WHERE id = :id AND excluded = 0";
    $query = $db->prepare($sql);

    $params = [
        'name' => $name,        
        'id' => $id        
    ];
    
    try
    {

        $query->execute($params);
        $_SESSION['nameTeam'] = $name;
        $_SESSION['loginTeam'] = '1';
        $_SESSION['idTeam'] = $id;
        header('Location: ../../../Views/Teams/welcome.php');

    }
    catch(PDOException $e) 
    {

        echo 'Error: ' . $e->getMessage();

    }
?>
