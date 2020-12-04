<?php

    session_start();
    
    include "../../Resources/Auth/isAdmin.php";
    include "layout.html";
    include "../../Database/connection.php"; 

    $queryOn = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");
    $queryOut = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");
?>

<div class="title"> <b>Criar Partida</b> </div>
<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href="welcome.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

<form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Admin/store.php" method="POST">

<div class="formCenter">

    Selecione o time 1:
    <select name="team_1" class="input">
<?php

    while($line = $queryOn->fetch())
    {

?>        
        <option value="<?= $line['name'] ?>">
        
            <?= $line['name'] ?>

        </option>
<?php

    }

?>
    </select>

    Selecione o time 2:
    <select name="team_2" class="input">
<?php

    while($line = $queryOut->fetch())
    {

?>        
        <option value="<?= $line['name'] ?>">
        
            <?= $line['name'] ?>

        </option>
<?php

    }

?>
    </select>

        <input type="date" name="date" class="input">

</div>
    
        <input type="submit" value="Enviar" class="buttonSend">

    </form>

<?php include "footer.html"; ?>