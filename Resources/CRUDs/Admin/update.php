<?php

    session_start();
    
    include "../../../Database/connection.php";  

    $id = $_POST['id'];
    $team_1 = $_POST['team_1'];
    $team_2 = $_POST['team_2'];
    $score_1 = $_POST['score_1'];
    $score_2 = $_POST['score_2'];
    $map_1 = $_POST['map_1'];
    $map_2 = $_POST['map_2'];
    $map_3 = $_POST['map_3'];
    $date = $_POST['date'];

    $sql = "UPDATE matches SET team_1 = :team_1, team_2 = :team_2, score_1 = :score_1, score_2 = :score_2, map_1 = :map_1, map_2 = :map_2, map_3 = :map_3, date = :date WHERE id = :id";

    $params = [
        'id' => $id,
        'team_1' => $team_1,
        'team_2' => $team_2,
        'score_1' => $score_1,
        'score_2' => $score_2,
        'map_1' => $map_1,
        'map_2' => $map_2,
        'map_3' => $map_3,
        'date' => $date
    ];
    
    $query = $db->prepare($sql);

    try
    {

        $query->execute($params);
        header('Location: ../../../Views/Admin/welcome.php');

    }
    catch(PDOException $e) 
    {

        echo 'Error: ' . $e->getMessage();

    }
?>
