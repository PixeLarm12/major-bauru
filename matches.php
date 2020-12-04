<?php

    session_start();
    include "layout.html";

?>
    
<div class="title"> <b> Ver partidas </b> </div>

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

<div class="tableTitle">  <b>Lista das partidas do Major </b>  </div>

<?php 

    include "Database/connection.php"; 

    $query = $db->query('SELECT id, team_1, team_2, score_1, score_2, date FROM matches ORDER BY date ASC');
    
    while($line = $query->fetch())
    {
        
?>

    <div class="tableRowMatch">
        <div class="tableItemsMatches">

            <div class="list"> <a href="http://200.145.153.172/lucasdomingues/Major/detailsMatch.php?id=<?= $line['id'] ?>" class="player-item"> <?= $line['team_1'] ?> &nbsp; <?= $line['score_1'] ?> <b>X</b> <?= $line['score_2'] ?> &nbsp; <?= $line['team_2'] ?> &nbsp; <i> (<?= $line['date'] ?>) </i> </a> </div>

        </div>
    </div>

<?php

}

?>

<?php include "footer.html"; ?>