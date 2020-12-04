<?php

    session_start();

    include "layout.html";
    include "Database/connection.php";  

    $id = $_GET['id'];

    
    $query = $db->query("SELECT team_1, team_2, score_1, score_2, date, map_1, map_2, map_3 FROM matches WHERE id = $id");
    
    $line = $query->fetch();
?>
<div class="title"> <b>Detalhes Partida</b> </div>

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

<div class="logoDiv"> <a href="index.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <div class="formLeft">
        
        Pontuação <?= $line['team_1'] ?>:
        <b class="details"> <?= $line['score_1'] ?> </b>

        Pontuação <?= $line['team_2'] ?>:
        <b class="details"> <?= $line['score_2'] ?> </b>

        Data: 
        <b class="details"> <?= $line['date'] ?> </b>
                
    </div>

    <div class="formRight">
      
        Mapa 1:
        <b class="details"> <?= $line['map_1'] ?> </b>

        Mapa 2:
        <b class="details"> <?= $line['map_2'] ?> </b>

        Mapa 3:
        <b class="details"> <?= $line['map_3'] ?> </b>

    </div>


<?php include "footer.html"; ?>