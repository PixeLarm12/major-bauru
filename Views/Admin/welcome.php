<?php

    session_start();

    include "../../Resources/Auth/isAdmin.php";
    include "layout.html";

?>

<div class="title"> <b>Bem vindo <?= $_SESSION['namePlayer'] ?>!</b></div>

<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href=""> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <div class="container">

        <a href="create.php"> <button class="button"> <b> Criar partida </b> </button> </a>
        
        <a href="show.php"> <button class="button"> <b> Ver todas as partidas </b> </button> </a>
        
    </div>

<?php include "footer.html"; ?>