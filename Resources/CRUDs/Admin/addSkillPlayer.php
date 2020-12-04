<?php

    session_start();
    
    include "../../../Database/connection.php";  

    $id = $_POST['id'];
    $kill = $_POST['kill'];
    $death = $_POST['death'];
    $value = $kill/$death;

    $kd = number_format($value, 1);

    $sql = 'UPDATE players SET kill = :kill, death = :death, kd = :kd WHERE id = :id AND excluded = 0';

    $params = [
        'id' => $id,
        'kill' => $kill,
        'death' => $death,
        'kd' => $kd,
    ];
    
    $query = $db->prepare($sql);

    try
    {

        $query->execute($params);
        header('Location: ../../../Views/Admin/playersList.php');

    }
    catch(PDOException $e) 
    {

        echo 'Error: ' . $e->getMessage();

    }
?>
