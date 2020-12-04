<?php

    session_start();
    include "layout.html";
    include "../../Resources/Auth/isAdmin.php";
    include "../../Database/connection.php"; 

    $id = $_GET['id'];

    $query = $db->query("SELECT id, name, win, defeat, score FROM teams WHERE id = " . $id);
    $line = $query->fetch();
?>

<div class="title"> <b> Ver times </b> </div>
<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href="welcome.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Admin/addSkillTeam.php" method="POST">

    <div class="formCenter">

        <input type="hidden" name="id" value="<?= $id ?>">
        Nome do time: <b class="details"> <?= $line['name'] ?> </b> <br>
        
        Vitórias:
        <input type="number" name="win" value="<?= $line['win'] ?>" class="input" placeholder="Número de vitórias">

        Derrotas:
        <input type="number" name="defeat" value="<?= $line['defeat'] ?>" class="input" placeholder="Número de derrotas">

        Pontos:
        <input type="number" name="score" value="<?= $line['score'] ?>" class="input" placeholder="Pontuação">


    </div>
    
        <input type="submit" value="Salvar" class="buttonSend">

    </form>

<?php include "footer.html"; ?>