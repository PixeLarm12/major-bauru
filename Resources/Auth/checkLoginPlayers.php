<?php

    session_start();
    include "../../Database/connection.php";

    $username = $_POST['username'];
    $passwordInput = $_POST['password'];
    $password = base64_encode($passwordInput);

    $sql = "SELECT id, username, password, adm FROM players WHERE username = :username AND password = :password AND excluded = 0";
    $query = $db->prepare($sql);

    $params = [
        'username' => $username,
        'password' => $password
    ];

    $query->execute($params);

    $line = $query->fetch();
    if($line['adm'] == 1)
    {
        $_SESSION['namePlayer'] = $username;
        $_SESSION['adm'] = 1;
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Admin/welcome.php');
    }
    else if(!$line)
    {
        $_SESSION['loginPlayer'] = '0';
        $_SESSION['idPlayer'] = '0';
        $_SESSION['adm'] = '0';
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Players/login.php');
    }
    else
    {
        $_SESSION['namePlayer'] = $username;
        $_SESSION['loginPlayer'] = '1';
        $_SESSION['idPlayer'] = $line['id'];
        $_SESSION['adm'] = '0';
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Players/welcome.php');
    }
?>