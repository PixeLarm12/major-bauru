<?php

    session_start();
    session_destroy();

    unset($_SESSION['loginPlayer']);
    unset($_SESSION['namePlayer']);

    header('Location: http://200.145.153.172/lucasdomingues/Major/index.php');