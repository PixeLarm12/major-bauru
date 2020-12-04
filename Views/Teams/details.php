<?php

    session_start();

    include "layout.html";
    include "../../Database/connection.php";  

    if($_SESSION['idTeam'] == $_GET['id'])
    {
        header('Location: edit.php');
    }

    $id = $_GET['id'];

    $playersQuery = $db->query("SELECT name, username FROM players WHERE team_id = " . $id . " AND adm = 0 ORDER BY username");
    $players = $playersQuery->fetchAll();
    $query = $db->query("SELECT name, win, defeat, score FROM teams WHERE excluded = 0 AND id = $id");
    $line = $query->fetch();
?>

<div class="title"> <b>Detalhes do Time</b> </div>

    <?php
    if($_SESSION['loginPlayer'] == 1)
    {
?>

    <div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 
        <a href="http://200.145.153.172/lucasdomingues/Major/Views/Players/edit.php" class="logout"> Perfil </a>

    </b> </div>
    
<?php
    }
    else if($_SESSION['loginTeam'] == 1)
    {        
?>

    <div class="login"> <b> Logado como: <?= $_SESSION['nameTeam'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 
        <a href="http://200.145.153.172/lucasdomingues/Major/Views/Teams/edit.php" class="logout"> Perfil </a>

    </b> </div>
    
<?php
    }
    else
    {
?>

    <div class="login"></div>

<?php
    }
?>

    <?php include "navBar.html"; ?>

    <div class="logoDiv"> <a href="http://200.145.153.172/lucasdomingues/Major/index.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <form>

        <div class="formLeft">

            Nome do time: <b class="details"> <?= $line['teamname'] ?> </b>
            Vitórias: <b class="details"> <?= $line['win'] ?> </b>
            Derrotas: <b class="details"> <?= $line['defeat'] ?> </b>
            Pontos: <b class="details"> <?= $line['score'] ?> </b>

        </div>

        <div class="formRight">
        
        Jogadores do time
<?php
    foreach($players as $player)
    {
?>
            <b class="details"> <?= $player['username'] ?> (<?= $player['name'] ?>) </b><br>
<?php        
    }
?>
        </div>
    
    </form>

<?php include "footer.html"; ?>