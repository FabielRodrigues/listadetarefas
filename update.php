<?php
require_once ('conexao.php');

$id = $_GET['id'];
$status = $_GET['s'];

$sql  = "UPDATE lista SET status = :status WHERE idlista = :idlista";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':status', $status, PDO::PARAM_INT);
$stmt->bindParam(':idlista', $id, PDO::PARAM_INT);
$stmt->execute();
header("location: ./");