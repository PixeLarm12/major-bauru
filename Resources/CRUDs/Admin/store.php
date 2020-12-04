<?php

include "../../../Database/connection.php";

$team_1 = $_POST['team_1'];
$team_2 = $_POST['team_2'];
$date = $_POST['date'];

$sql = 'INSERT INTO matches (team_1, team_2, score_1, score_2, date, map_1, map_2, map_3) VALUES (:team_1, :team_2, :score_1, :score_2, :date, :map_1, :map_2, :map_3)';

$params = [
    'team_1' => $team_1, 
    'team_2' => $team_2, 
    'score_1' => 0, 
    'score_2' => 0, 
    'date' => $date, 
    'map_1' => null, 
    'map_2' => null, 
    'map_3' => null
];

$query = $db->prepare($sql);

try
{
    $query->execute($params);
    header('Location: ../../../Views/Admin/welcome.php');
}

catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}