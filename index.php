<?php

    session_start();
    include "layout.html";

?>
    
<ul>

<div class="title"> <b> Bem vindo à página inicial! </b> </div>

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

<div class="logoDiv"> <a href=""> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

<div class="container"> 

<table class="table-index">

    <tr class="row-index">

         <td class="column-index"> <a href="http://200.145.153.172/lucasdomingues/Major/Views/Players/welcome.php"> <button class="button"> <b>Jogadores</b> </button> </a>  </td> 

         <td class="column-index"> <a href="http://200.145.153.172/lucasdomingues/Major/Views/Teams/welcome.php"> <button class="button"> <b>Times</b> </button> </a>  </td>
    
    </tr>

    <tr class="row-index">

         <td class="column-index"> <a href="scoreboard.php"> <button class="button"> <b>Ver pontuação</b> </button> </a>  </td> 

         <td class="column-index"> <a href="App/Rules/Major.pdf"> <button class="button"> <b>Sobre o campeonato</b> </button> </a>  </td>
    
    </tr>
    

</table>
</div>

<?php include "footer.html"; ?>