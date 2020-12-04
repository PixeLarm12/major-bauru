<?php

if($_SESSION['loginPlayer'] == 0)
{
    header('Location: ../../../Views/Players/login.php');
}

include "../../../Database/connection.php";

$name = $_POST['name'];
$passwordInput = $_POST['password'];
$password = base64_encode($passwordInput);

$sql = 'INSERT INTO teams (name, password, excluded, win, defeat, score) VALUES (:name, :password, :excluded, :win, :defeat, :score)';

$params = [
    'name' => $name,
    'password' => $password,
    'excluded' => 0,
    'win' => 0,
    'defeat' => 0,
    'score' => 0,
];

$query = $db->prepare($sql);

try
{
    $query->execute($params);
    echo "<script type='text/javascript'>alert('Conta criada como sucesso! Faça login para entrar')</script>";
    header('Location: ../../../Views/Teams/login.php');
}catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}