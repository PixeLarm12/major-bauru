<?php

    session_start();

    include "layout.html";
    include "../../Database/connection.php";  
    
    if($_SESSION['loginTeam'] == '1')
    {
        header('Location: http://200.145.153.172/lucasdomingues/Major/Views/Teams/welcome.php');
    } 
    else if($_SESSION['loginPlayer'] != '1')
    {
        header('Location: login.php');
    }

    $id = $_SESSION['idPlayer'];

    $queryTeams = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");

    $query = $db->query("SELECT players.name, teams.name AS team, username, rank, team_id, email, class FROM players INNER JOIN teams ON teams.id = players.team_id WHERE players.id = $id");
    $line = $query->fetch();

    if($_SESSION['namePlayer'] != $line['username'])
    {
        header('Location: login.php');
    }

    $idTeam = $line['team_id'];
?>

    <div class="title"> <b>Editar Player</b> </div>

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

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Players/update.php" method="POST">

    <div class="formLeft">
        
        Username:
        <input type="text" name="username" value="<?= $line['username'] ?>" class="input" placeholder="Username" required>

        Nome:
        <input type="text" name="name" value="<?= $line['name'] ?>" class="input" placeholder="Nome Completo" required>

        Email:
        <input type="email" name="email" value="<?= $line['email'] ?>" class="input" placeholder="E-mail" required>

    </div>
        
    <div class="formRight">

        Selecione sua patente:
        <select name="rank" class="input">

            <option value="Sem Patente"         <?php if($line['rank'] == 'Sem Patente') { echo "selected"; } ?>> Sem Patente </option>
            <option value="Prata 1"             <?php if($line['rank'] == 'Prata 1') { echo "selected"; } ?>> Prata 1 </option>
            <option value="Prata 2"             <?php if($line['rank'] == 'Prata 2') { echo "selected"; } ?>> Prata 2 </option>
            <option value="Prata 3"             <?php if($line['rank'] == 'Prata 3') { echo "selected"; } ?>> Prata 3 </option>
            <option value="Prata 4"             <?php if($line['rank'] == 'Prata 4') { echo "selected"; } ?>> Prata 4 </option>
            <option value="Prata Elite"         <?php if($line['rank'] == 'Prata Elite') { echo "selected"; } ?>> Prata Elite </option>
            <option value="Prata Elite Mestre"  <?php if($line['rank'] == 'Prata Elite Mestre') { echo "selected"; } ?>> Prata Elite Mestre </option>
            <option value="Ouro 1"              <?php if($line['rank'] == 'Ouro 1') { echo "selected"; } ?>> Ouro 1 </option>
            <option value="Ouro 2"              <?php if($line['rank'] == 'Ouro 2') { echo "selected"; } ?>> Ouro 2 </option>
            <option value="Ouro 3"              <?php if($line['rank'] == 'Ouro 3') { echo "selected"; } ?>> Ouro 3 </option>
            <option value="Ouro 4"              <?php if($line['rank'] == 'Ouro 4') { echo "selected"; } ?>> Ouro Mestre </option>
            <option value="AK 1"                <?php if($line['rank'] == 'AK 1') { echo "selected"; } ?>> AK 1 </option>
            <option value="AK 2"                <?php if($line['rank'] == 'AK 2') { echo "selected"; } ?>> AK 2 </option>
            <option value="AK Cruzada"          <?php if($line['rank'] == 'AK Cruzada') { echo "selected"; } ?>> AK Cruzada </option>
            <option value="Xerife"              <?php if($line['rank'] == 'Xerife') { echo "selected"; } ?>> Xerife </option>
            <option value="Águia 1"             <?php if($line['rank'] == 'Águia 1') { echo "selected"; } ?>> Águia 1 </option>
            <option value="Águia 2"             <?php if($line['rank'] == 'Águia 2') { echo "selected"; } ?>> Águia 2 </option>
            <option value="Supremo"             <?php if($line['rank'] == 'Supremo') { echo "selected"; } ?>> Supremo </option>
            <option value="Global Elite"        <?php if($line['rank'] == 'Global Elite') { echo "selected"; } ?>> Global Elite </option>

        </select>

        Selecione o seu time:
        <select name="team_id" class="input">

<?php

    while($lineTeams = $queryTeams->fetch())
    {
?>        
            <option value="<?= $lineTeams['id'] ?>" <?php if($lineTeams['id'] === $idTeam){echo "selected";} ?>>
            
                <?= $lineTeams['name'] ?>

            </option>
<?php

    }

?>
        </select>

        Qual a sua sala?
    <select name="class" class="input">

        <option value="81A" <?php if($line['class'] == '81A') { echo "selected"; } ?>> 1° Info A (diurno) </option>
        <option value="82A" <?php if($line['class'] == '82A') { echo "selected"; } ?>> 2° Info A (diurno) </option>
        <option value="83A" <?php if($line['class'] == '83A') { echo "selected"; } ?>> 3° Info A (diurno) </option>

        <option value="81B" <?php if($line['class'] == '81B') { echo "selected"; } ?>> 1° Info B (diurno) </option>
        <option value="82B" <?php if($line['class'] == '82B') { echo "selected"; } ?>> 2° Info B (diurno) </option>
        <option value="83B" <?php if($line['class'] == '83B') { echo "selected"; } ?>> 3° Info B (diurno) </option>
        
        <option value="81C" <?php if($line['class'] == '81C') { echo "selected"; } ?>> 1° Eletrônica (diurno) </option>
        <option value="82C" <?php if($line['class'] == '82C') { echo "selected"; } ?>> 2° Eletrônica (diurno) </option>
        <option value="83C" <?php if($line['class'] == '83C') { echo "selected"; } ?>> 3° Eletrônica (diurno) </option>
        
        <option value="81D" <?php if($line['class'] == '81D') { echo "selected"; } ?>> 1° Mecânica (diurno) </option>
        <option value="82D" <?php if($line['class'] == '82D') { echo "selected"; } ?>> 2° Mecânica (diurno) </option>
        <option value="83D" <?php if($line['class'] == '83D') { echo "selected"; } ?>> 3° Mecânica (diurno) </option>

        <option value="71AB" <?php if($line['class'] == '71AB') { echo "selected"; } ?>> 1° Info (noturno) </option>
        <option value="72AB" <?php if($line['class'] == '72AB') { echo "selected"; } ?>> 2° Info (noturno) </option>
        <option value="73AB" <?php if($line['class'] == '73AB') { echo "selected"; } ?>> 3° Info (noturno) </option>

        <option value="71C" <?php if($line['class'] == '71C') { echo "selected"; } ?>> 1° Eletrônica (noturno) </option>
        <option value="72C" <?php if($line['class'] == '72C') { echo "selected"; } ?>> 2° Eletrônica (noturno) </option>
        <option value="73C" <?php if($line['class'] == '73C') { echo "selected"; } ?>> 3° Eletrônica (noturno) </option>

        <option value="71D" <?php if($line['class'] == '71D') { echo "selected"; } ?>> 1° Mecânica (noturno) </option>
        <option value="72D" <?php if($line['class'] == '72D') { echo "selected"; } ?>> 2° Mecânica (noturno) </option>
        <option value="73D" <?php if($line['class'] == '73D') { echo "selected"; } ?>> 3° Mecânica (noturno) </option>

    </select>
        
    </div>

        <input type="submit" value="Enviar" class="buttonSend">

    </form>

    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Players/delete.php" method="POST">

        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Deletar" class="buttonDelete">

    </form>

<?php include "footer.html"; ?>