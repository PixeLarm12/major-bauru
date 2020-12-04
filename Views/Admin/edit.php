<?php

    session_start();

    include "../../Resources/Auth/isAdmin.php";
    include "layout.html";
    include "../../Database/connection.php";  

    $id = $_GET['id'];

    $queryTeam1 = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");
    $queryTeam2 = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");
    
    $queryMap1 = $db->query("SELECT id, name FROM maps ORDER BY name ASC");
    $queryMap2 = $db->query("SELECT id, name FROM maps ORDER BY name ASC");
    $queryMap3 = $db->query("SELECT id, name FROM maps ORDER BY name ASC");
    
    $query = $db->query("SELECT team_1, team_2, score_1, score_2, date, map_1, map_2, map_3 FROM matches WHERE id = $id");
    
    $line = $query->fetch();

    $team1 = $line['team_1'];
    $team2 = $line['team_2'];

    $map1 = $line['map_1'];
    $map2 = $line['map_2'];
    $map3 = $line['map_3'];
?>
<div class="title"> <b>Editar Partida</b> </div>

<div class="login"> <b> Logado como: <?= $_SESSION['namePlayer'] ?> 

        <a href="http://200.145.153.172/lucasdomingues/Major/Resources/Auth/logout.php" class="logout"> Sair </a> &nbsp; 

</b> </div>

<?php include "navBar.html"; ?>

<div class="logoDiv"> <a href="welcome.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Admin/update.php" method="POST">

    <div class="formLeft">

        <input type="hidden" name="id" value="<?= $id ?>">
        
        Pontuação <?= $line['team_1'] ?>:
        <input type="text" name="score_1" value="<?= $line['score_1']  ?>" class="input" placeholder="Pontuação <?= $line['team_1'] ?>">

        Pontuação <?= $line['team_2'] ?>:
        <input type="text" name="score_2" value="<?= $line['score_2'] ?>" class="input" placeholder="Pontuação <?= $line['team_2'] ?>"><br>

        <input type="date" name="date" value="<?= $line['date'] ?>" class="input">

        Time 1:
        <select name="team_1" class="input">

<?php

    while($lineTeam1 = $queryTeam1->fetch())
    {
?>        
            <option value="<?= $lineTeam1['name'] ?>" <?php if($lineTeam1['name'] === $team1){echo "selected";} ?>>
            
                <?= $lineTeam1['name'] ?>

            </option>
<?php

    }

?>
        </select>
        
    </div>

    <div class="formRight">

        Time 2:
        <select name="team_2" class="input">

<?php

    while($lineTeam2 = $queryTeam2->fetch())
    {
?>        
            <option value="<?= $lineTeam2['name'] ?>" <?php if($lineTeam2['name'] === $team2){echo "selected";} ?>>
            
                <?= $lineTeam2['name'] ?>

            </option>
<?php

    }

?>
        </select>
      
        Mapa 1:
        <select name="map_1" class="input">

<?php

    while($lineMap1 = $queryMap1->fetch())
    {
?>        
            <option value="<?= $lineMap1['name'] ?>" <?php if($lineMap1['name'] === $map1){echo "selected";} ?>>
            
                <?= $lineMap1['name'] ?>

            </option>
<?php

    }

?>
        </select>


        Mapa 2:
        <select name="map_2" class="input">

<?php

    while($lineMap2 = $queryMap2->fetch())
    {
?>        
            <option value="<?= $lineMap2['name'] ?>" <?php if($lineMap2['name'] === $map2){echo "selected";} ?>>
            
                <?= $lineMap2['name'] ?>

            </option>
<?php

    }

?>
        </select>


        Mapa 3:
        <select name="map_3" class="input">

<?php

    while($lineMap3 = $queryMap3->fetch())
    {
?>        
            <option value="<?= $lineMap3['name'] ?>" <?php if($lineMap3['name'] === $map3){echo "selected";} ?>>
            
                <?= $lineMap3['name'] ?>

            </option>
<?php

    }

?>
        </select>

    </div>

        <input type="submit" value="Enviar" class="buttonSend">

    </form> 

<?php include "footer.html"; ?>