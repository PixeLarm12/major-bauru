<?php

    session_start();
    include "layout.html";

?>

<div class="title"> <b> Vendo players </b> </div>

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

        <div class="tableTitle">  <b>Lista dos players do Major </b>  </div>

<?php 
    
        include "../../Database/connection.php"; 

        $query = $db->query('SELECT id, name, username FROM players WHERE excluded = 0 AND adm = 0 ORDER BY username ASC');

        while($line = $query->fetch())
        {
            
    ?>
        <div class="tableRow">
            <div class="tableItems">

                <div class="list"> <a href="details.php?id=<?= $line['id'] ?>" class="player-item"> <?= $line['username'] ?> (<?= $line['name'] ?>) </a> </div>

            </div>
        </div>

        <?php

        }

        ?>
        </div>

<?php include "footer.html"; ?>