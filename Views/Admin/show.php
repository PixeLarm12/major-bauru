<?php

    session_start();
    
    include "../../Resources/Auth/isAdmin.php";
    include "layout.html";

?>
    
<div class="title"> <b> Ver partidas </b> </div>

<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href="welcome.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

<div class="tableTitle">  <b>Lista das partidas do Major </b>  </div>

<?php 

    include "../../Database/connection.php"; 

    $query = $db->query('SELECT id, team_1, team_2, date FROM matches ORDER BY date ASC');
    
    while($line = $query->fetch())
    {
        
?>

    <div class="tableRowMatch">
        <div class="tableItemsMatches">

            <div class="list"> <?= $line['team_1'] ?> &nbsp; <b>X</b> &nbsp; <?= $line['team_2'] ?> &nbsp; <i> (<?= $line['date'] ?>) </i> <a href="edit.php/?id=<?= $line['id'] ?>" class="player-item"> &nbsp; Ver </a> </div>

        </div>
    </div>

<?php

}

?>

<?php include "footer.html"; ?>