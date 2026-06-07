<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mesas = $_POST['mesa'];
    $status = $_POST['status'];
    $capacidade = $_POST['capacidade'];

    $stmt = $conexao->prepare("INSERT INTO mesas (numero_mesa, status, capacidade) VALUES (:numero_mesa, :status, :capacidade)");
    $stmt->bindValue(":numero_mesa", $mesas);
    $stmt->bindValue(":status", $status);
    $stmt->bindValue(":capacidade", $capacidade);

    if ($stmt->execute()) {
        header("Location: indexmes.php");
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
    <title>Adicionar mesas</title>

</head>
<body>  
    <h1> Adicionar novas mesas </h1><br>
     <form action="createmes.php" method="post">
        <label for="name">Adicionar número da mesa: </label>
        <input type="number" name ="mesa" id ="mesa"><br>

        <label for="name">Capacidade: </label>
        <input type="number" name ="capacidade" id ="mesa"><br>

        <label>status: </label>
        <input type="radio" name="status" id="capacidade" value="disponivel" required>
        <label for="capacidade">Disponivel</label>
        <input type="radio" name="status" id="semcapacidade" value="não disponivel">
        <label for="semcapacidade" >Não disponivel</label><br>
        <button type="submit">Salvar</button>
        <a href="indexmes.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
