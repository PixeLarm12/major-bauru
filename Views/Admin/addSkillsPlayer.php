<?php

    session_start();
    include "layout.html";
    include "../../Resources/Auth/isAdmin.php";
    include "../../Database/connection.php"; 

    $id = $_GET['id'];

    $query = $db->query("SELECT id, username, kill, death, kd FROM players WHERE id = $id");
    $line = $query->fetch();
?>

<div class="title"> <b> Ver players </b> </div>
<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href="welcome.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Admin/addSkillPlayer.php" method="POST">

    <div class="formCenter">

        <input type="hidden" name="id" value="<?= $id ?>">
        Username: <b class="details"> <?= $line['username'] ?> </b> <br>
        
        Kills:
        <input type="number" name="kill" value="<?= $line['kill'] ?>" class="input" placeholder="Número de kills">

        Deaths:
        <input type="number" name="death" value="<?= $line['death'] ?>" class="input" placeholder="Número de deaths">

        K/D:
        <input type="text" value="<?= $line['kd'] ?>" class="input" readonly>

    </div>
    
        <input type="submit" value="Salvar" class="buttonSend">

    </form>

<?php include "footer.html"; ?>