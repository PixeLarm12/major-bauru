<?php

    if($_SESSION['adm'] != 1)
    {
        header('Location: http://200.145.153.172/Major/index.php');
    }