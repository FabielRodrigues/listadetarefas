<?php
/**
 * Created by PhpStorm.
 * User: fabiel.rodrigues
 * Date: 19/05/2016
 * Time: 13:49
 */
require_once ('conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM lista WHERE idlista =  :idlista";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idlista', $id, PDO::PARAM_INT);
$stmt->execute();
header("location: ./");