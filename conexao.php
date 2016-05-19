<?php
/*
* Conecta com banco de dados.
*/
$pdo = new PDO(
    'mysql:host=localhost;dbname=tarefas',
    'root',
    '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);