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
    include "../../Database/connection.php"; 

    $query = $db->query("SELECT id, name FROM teams WHERE excluded = 0 ORDER BY name ASC");
?>

    <div class="title"> <b>Criar um perfil</b> </div>
    <div class="login"></div>
    
    <?php include "navBar.html"; ?>

    <div class="logoDiv"> <a href="http://200.145.153.172/lucasdomingues/Major/index.php"> <img src="http://200.145.153.172/lucasdomingues/Major/Images/Logo/MajorLogo.png" class="logo"> </a> </div>
    
    <form action="http://200.145.153.172/lucasdomingues/Major/Resources/CRUDs/Players/store.php" method="POST">
    
    <div class="formLeft">

        Nome completo:
        <input type="text" name="name" placeholder="Nome Completo" class="input" required><br>

        Número de RA:
        <input type="number" name="RA" placeholder="RA" class="input" required><br>

        Email:
        <input type="email" name="email" placeholder="E-mail" class="input" required><br>

        Usuário
        <input type="text" name="username" placeholder="Username" class="input" required><br>
        
        Senha
        <input type="password" name="password" placeholder="Senha" class="input" required><br>
        
    </div>

    <div class="formRight"> 
    
        Selecione o seu time: <a href="http://200.145.153.172/lucasdomingues/Major/Views/Teams/create.php" class="player-item"> (Clique aqui para criar um!) </a>
    
        <select name="team_id" class="input"><br>

<?php

    while($line = $query->fetch())
    {

?>        
        <option value="<?= $line['id'] ?>">
        
            <?= $line['name'] ?>

        </option>
<?php

    }

?>
    </select><br>

    Selecione a sua patente:
    <select name="rank" class="input">

        <option value="Sem Patente" selected> Sem Patente </option>
        <option value="Prata 1" > Prata 1 </option>
        <option value="Prata 2"> Prata 2 </option>
        <option value="Prata 3"> Prata 3 </option>
        <option value="Prata 4"> Prata 4 </option>
        <option value="Prata Elite"> Prata Elite </option>
        <option value="Prata Elite Mestre"> Prata Elite Mestre </option>
        <option value="Ouro 1"> Ouro 1 </option>
        <option value="Ouro 2"> Ouro 2 </option>
        <option value="Ouro 3"> Ouro 3 </option>
        <option value="Ouro 4"> Ouro Mestre </option>
        <option value="AK 1"> AK 1 </option>
        <option value="AK 2"> AK 2 </option>
        <option value="AK Cruzada"> AK Cruzada </option>
        <option value="Xerife"> Xerife </option>
        <option value="Águia 1"> Águia 1 </option>
        <option value="Águia 2"> Águia 2 </option>
        <option value="Supremo"> Supremo </option>
        <option value="Global Elite"> Global Elite </option>

    </select><br>

    Qual a sua sala?
    <select name="class" class="input">

        <option value="81A" selected> 1° Info A (diurno) </option>
        <option value="82A"> 2° Info A (diurno) </option>
        <option value="83A"> 3° Info A (diurno) </option>

        <option value="81B"> 1° Info B (diurno) </option>
        <option value="82B"> 2° Info B (diurno) </option>
        <option value="83B"> 3° Info B (diurno) </option>
        
        <option value="81C"> 1° Eletrônica (diurno) </option>
        <option value="82C"> 2° Eletrônica (diurno) </option>
        <option value="83C"> 3° Eletrônica (diurno) </option>
        
        <option value="81D"> 1° Mecânica (diurno) </option>
        <option value="82D"> 2° Mecânica (diurno) </option>
        <option value="83D"> 3° Mecânica (diurno) </option>

        <option value="71AB"> 1° Info (noturno) </option>
        <option value="72AB"> 2° Info (noturno) </option>
        <option value="73AB"> 3° Info (noturno) </option>

        <option value="71C"> 1° Eletrônica (noturno) </option>
        <option value="72C"> 2° Eletrônica (noturno) </option>
        <option value="73C"> 3° Eletrônica (noturno) </option>

        <option value="71D"> 1° Mecânica (noturno) </option>
        <option value="72D"> 2° Mecânica (noturno) </option>
        <option value="73D"> 3° Mecânica (noturno) </option>

    </select><br><br>

    </div>
    
        <input type="submit" value="Enviar" class="buttonSend">

    </form>

<?php include "footer.html"; ?>