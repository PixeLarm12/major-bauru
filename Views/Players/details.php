<?php

    session_start();

    include "layout.html";
    include "../../Database/connection.php";  

    if($_SESSION['idPlayer'] == $_GET['id'])
    {
        header('Location: edit.php');
    }

    $id = $_GET['id'];

    $queryTeams = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");

    $query = $db->query("SELECT players.name, teams.name AS team, username, class, rank, team_id, kill, death, kd FROM players INNER JOIN teams ON teams.id = players.team_id WHERE players.id = $id");
    $line = $query->fetch();

    $idTeam = $line['team_id'];
?>

    <div class="title"> <b>Detalhes do Jogador</b> </div>

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

            Username: <b class="details"> <?= $line['username'] ?> </b> <br> 
            Nome: <b class="details"> <?= $line['name'] ?> </b> <br> 
            Patente: <b class="details"> <?= $line['rank'] ?> </b> <br> 
            Time: <b class="details"> <?= $line['team'] ?> </b> <br>

        </div>

        <div class="formRight">
             
            Sala: <b class="details"> <?= $line['class'] ?> </b> <br> 
            Kills: <b class="details"> <?= $line['kill'] ?> </b> <br> 
            Deaths: <b class="details"> <?= $line['death'] ?> </b> <br> 
            K/D: <b class="details"> <?= $line['kd'] ?> </b> <br> 

        </div>
    
    </form>

<?php include "footer.html"; ?>