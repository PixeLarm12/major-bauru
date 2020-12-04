<?php

    session_start();
    include "layout.html";
    include "Database/connection.php";

    $sql = $db->query("SELECT * FROM teams ORDER BY score");

    $teams = $sql->fetchAll();
?>

<div class="title"> <b> Placar </b> </div>
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

<?php 
    include "navBar.html"; 

    $rank = 1;
    foreach($teams as $team)
    {
?>

    <div class="formCenter">

        <table class="tableScoreTitle">

            <tr class="rowScoreTitle">
                <td class="rankTable">
                    Rank
                </td>
                
                <td class="nameTable">
                    Nome do time
                </td>

                <td class="pointTable">
                    Pontos
                </td>

            </tr>

        </table>
        <table class="tableScore">

            <tr>

            <td class="rankTable">
                    <?=$rank?>
                </td>
                
                <td class="nameTable">
                    <?=$team["name"]?>
                </td>

                <td class="pointTable">
                    <?=$team["score"]?>
                </td>
            
            </tr>

        </table>

    </div>

<?php
        $rank++;
    }
?>

    <form action="http://200.145.153.172/lucasdomingues/Major/matches.php" method="GET">
        <input type="submit" value="Ver partidas" class="buttonSend">
    </form>

<?php
    include "footer.html"; 
?>