<?php

    session_start();

    include  "layout.html";
    include "../../Database/connection.php";  

    if($_SESSION['loginPlayer'] == 1)
    {
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Players/welcome.php');
    } 
    else if($_SESSION['loginTeam'] == 0)
    {
        header('Location: login.php');
    }

    $id = $_SESSION['idTeam'];
    
    $query = $db->query("SELECT name FROM teams WHERE id = " . $id);

    $line = $query->fetch();
    
    if($_SESSION['nameTeam'] != $line['name'])
    {
        header('Location: login.php');
    }
?>

    <div class="title"> <b>Editar Time</b> </div>

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
    
    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Teams/update.php" method="POST">
            
        <div class="formCenter">

            Nome do time:
            <input type="text" name="name" value="<?= $line['name'] ?>" placeholder="Nome do time" class="input" required>

        </div>
        
        <input type="submit" value="Editar" class="buttonSend">
    
    </form>
    
    
    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Teams/delete.php" method="POST">

        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Deletar" class="buttonDelete">
    
    </form>

<?php include "footer.html"; ?>