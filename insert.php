<?php
require_once ('conexao.php');
/*
 * Inserindo dados na tabela de tarefas
 */
$tarefa = $_POST['tarefa'];
if(isset($tarefa) != "") {
    $data = date("Y-m-d H:i:s");
    $status = 0;
    $sql = $pdo->prepare("INSERT INTO lista (nome, data, status) VALUES (:nome, :data, :status)");
    $sql->bindParam(':nome', $tarefa);
    $sql->bindParam(':data', $data);
    $sql->bindParam(':status', $status);
    $sql->execute();

    header("location: ./");
}

?>


