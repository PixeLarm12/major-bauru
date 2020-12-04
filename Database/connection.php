<?php 

include 'config.php';

$db = new PDO(
    "pgsql:host=$host;
    port=5432;
    dbname=$dbname;
    user=$user;
    password=$password"
);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);