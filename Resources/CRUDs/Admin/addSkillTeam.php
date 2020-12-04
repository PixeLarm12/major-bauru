<?php

    session_start();
    
    include "../../../Database/connection.php";  

    $id = $_POST['id'];
    $win = $_POST['win'];
    $defeat = $_POST['defeat'];
    $score = $_POST['score'];

    $sql = 'UPDATE teams SET win = :win, defeat = :defeat, score = :score WHERE id = :id AND excluded = 0';

    $params = [
        'id' => $id,
        'win' => $win,
        'defeat' => $defeat,
        'score' => $score,
    ];
    
    $query = $db->prepare($sql);

    try
    {

        $query->execute($params);
        header('Location: ../../../Views/Admin/teamsList.php');

    }
    catch(PDOException $e) 
    {

        echo 'Error: ' . $e->getMessage();

    }
?>
