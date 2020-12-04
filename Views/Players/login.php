<?php

    session_start();

    if($_SESSION['loginPlayer'] == '1')
    {
        header('Location: welcome.php');
    }
    else if($_SESSION['loginTeam'] == '1')
    {
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Teams/welcome.php');
    }
    
    include "layout.html";
?>
    
    <div class="title"> <b>Entrar</b> </div>
    <div class="login"></div>

    <?php include "navBar.html"; ?>

    <div class="logoDiv"> <a href="http://200.145.153.172/lucasdomingues/Major/index.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/checkLoginPlayers.php" method="POST">

        <div class="formCenter">

            <input type="text" name="username" class="input" placeholder="Jogador" required>
            
            <input type="password" name="password" class="input" placeholder="Senha" required>
            
        </div>

        <input type="submit" value="Enviar" class="buttonSend">
        
    </form>
    
<?php include "footer.html"; ?>