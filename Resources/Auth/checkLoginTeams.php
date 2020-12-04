<?php

    session_start();
    include "../../Database/connection.php";

    $name = $_POST['name'];
    $passwordInput = $_POST['password'];
    $password = base64_encode($passwordInput);

    $sql = "SELECT id, name, password FROM teams WHERE name = :name AND password = :password AND excluded = 0";
    
    $query = $db->prepare($sql);

    $params = [
        'name' => $name,
        'password' => $password
    ];

    $query->execute($params);
    $line = $query->fetch();
    if($line == false)
    {
        $_SESSION['loginTeam'] = '0';
        $_SESSION['idTeam'] = '0';
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Teams/login.php');
    }
    else
    {
        $_SESSION['nameTeam'] = $name;
        $_SESSION['loginTeam'] = '1';
        $_SESSION['idTeam'] = $line['id'];
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Teams/welcome.php');
    }
?>