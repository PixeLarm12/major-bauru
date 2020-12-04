<?php

    session_start();

    if($_SESSION['loginTeam'] == '1')
    {
        header('Location: welcome.php');
    }
    else if($_SESSION['loginPlayer'] == '1')
    {
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Players/welcome.php');
    }

    include "layout.html";

?>
    
    <div class="title"> <b>Criar Time</b> </div>

    <div class="login"></div>
    
    <?php include "navBar.html"; ?>

    <div class="logoDiv"> <a href="http://200.145.153.172/lucasdomingues/Major/index.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Teams/store.php" method="POST">
    
    <div class="formCenter">

        Nome do time:
        <input type="text" name="name" class="input" placeholder="Nome do time" required>

        Senha:
        <input type="password" name="password" class="input" placeholder="Senha" required>

    </div>
    
        <input type="submit" value="Enviar" class="buttonSend">

    </form>

<?php include "footer.html"; ?>