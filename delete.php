<?php
require_once ('conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM lista WHERE idlista =  :idlista";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idlista', $id, PDO::PARAM_INT);
$stmt->execute();
header("location: ./");