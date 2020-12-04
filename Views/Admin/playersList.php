<?php

    session_start();
    include "layout.html";

?>

<div class="title"> <b> Ver players </b> </div>
<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href="welcome.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

        <div class="tableTitle">  <b>Lista dos players do Major </b>  </div>

<?php 
    
        include "../../Database/connection.php"; 

        $query = $db->query('SELECT id, name, username FROM players WHERE excluded = 0 AND adm = 0 ORDER BY username ASC');

        while($line = $query->fetch())
        {
            
    ?>
        <div class="tableRow">
            <div class="tableItems">

                <div class="list"> <a href="http://200.145.153.172/lucasdomingues/Major/Views/Admin/addSkillsPlayer.php?id=<?=$line['id']?>" class="player-item"> <?= $line['username'] ?> (<?= $line['name'] ?>) </a> </div>

            </div>
        </div>

        <?php

        }

        ?>
        </div>

<?php include "footer.html"; ?>