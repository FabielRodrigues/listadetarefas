<?php
/**
 * Created by PhpStorm.
 * User: fabiel.rodrigues
 * Date: 19/05/2016
 * Time: 13:52
 */
require_once ('conexao.php');

$id = $_GET['id'];
$status = $_GET['s'];

$sql  = "UPDATE lista SET status = :status WHERE idlista = :idlista";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':status', $status, PDO::PARAM_INT);
$stmt->bindParam(':idlista', $id, PDO::PARAM_INT);
$stmt->execute();
header("location: ./");