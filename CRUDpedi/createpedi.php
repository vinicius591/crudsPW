<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pedidos = $_POST['pedido'];
    $item = $_POST['item'];
    $status = $_POST['status'];

    $stmt = $conexao->prepare("INSERT INTO pedidos (mesa, item, status) VALUES (:pedido, :item, :status)");
    $stmt->bindValue(":pedido", $pedidos);
    $stmt->bindValue(":item", $item);
    $stmt->bindValue(":status", $status);

    if ($stmt->execute()) {
        header("Location: indexpedi.php");
        exit();
    }  else {
        $erro = $stmt->errorInfo();
        echo "Erro ao salvar: " . $erro[2];
    }  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar pedidos</title>

</head>
<body>  
    <h1> Adicionar novos pedidos </h1><br>
     <form action="createpedi.php" method="post">
        <label for="pedido">Adicionar pedido: </label>
        <input type="number" name ="pedido" id ="pedido"><br>

        <label for="item">item: </label>
        <input type="text" name ="item" id ="pedido"><br>

        <label>status: </label>
        <input type="text" name="status" id="status" required><br>
        <button type="submit">Salvar</button>
        <a href="indexpedi.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
