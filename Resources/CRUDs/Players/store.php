<?php

include "../../../Database/connection.php";

$RA  = $_POST['RA']; 

$length = ceil(log10(abs($RA)));

if($length == 7)
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $passwordInput = $_POST['password'];
    $password = base64_encode($passwordInput);

    $rank = $_POST['rank'];
    $class = $_POST['class'];
    $team_id = $_POST['team_id'];

    $sql = "INSERT INTO players (name, username, password, rank, class, ra, email, team_id, adm, kill, death, kd, excluded) VALUES (:name, :username, :password, :rank, :class, :ra, :email, :team_id, 0, 0, 0, 0.0, :excluded)";

    $query = $db->prepare($sql);

    $params = [
        'name' => $name,
        'username' => $username,
        'password' => $password,
        'rank' => $rank,
        'class' => $class,
        'ra' => $RA,
        'email' => $email,
        'team_id' => $team_id,
        'excluded' => 0
    ];

    try
    {
        $query->execute($params);
        header('Location: ../../../Views/Players/login.php');
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
else{
    header('Location: ../../../Views/Players/create.php');
}