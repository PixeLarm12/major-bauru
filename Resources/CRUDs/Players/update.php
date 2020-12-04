<?php

    session_start();

    include "../../../Database/connection.php";  

    $id = $_SESSION['idPlayer'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $rank = $_POST['rank'];
    $team_id = $_POST['team_id'];

    $sql = "UPDATE players SET username = :username, name = :name, email = :email, class = :class, rank = :rank, team_id = :team_id WHERE id = :id AND excluded = 0";

    $params = [
        'id' => $id,
        'username' => $username,
        'name' => $name,
        'email' => $email,
        'class' => $class,
        'rank' => $rank,
        'team_id' => $team_id,
    ];
    
    $query = $db->prepare($sql);

    try
    {

        $query->execute($params);
        $_SESSION['namePlayer'] = $username;
        $_SESSION['loginPlayer'] = '1';
        $_SESSION['idPlayer'] = $id;
        header('Location: ../../../Views/Players/welcome.php');

    }
    catch(PDOException $e) 
    {

        echo 'Error: ' . $e->getMessage();

    }
?>
