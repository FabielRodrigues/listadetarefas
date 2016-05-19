<?php
/**
 * Created by PhpStorm.
 * User: fabiel.rodrigues
 * Date: 19/05/2016
 * Time: 12:16
 */
/*
* Conecta com banco de dados.
*/
$pdo = new PDO(
    'mysql:host=localhost;dbname=tarefas',
    'root',
    '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);