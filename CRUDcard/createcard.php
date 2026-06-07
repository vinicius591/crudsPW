<?php 
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comida = $_POST['nome'];
    $preco = $_POST['preco'];
    $disp = $_POST['disp'];

    $stmt = $conexao->prepare("INSERT INTO cardapio (nome, preco, disponivel) VALUES (:nome, :preco, :disponivel)");
    $stmt->bindValue(":nome", $comida);
    $stmt->bindValue(":preco", $preco);
    $stmt->bindValue(":disponivel", $disp);

    if ($stmt->execute()) {
        header("Location: indexcard.php");
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
    <title>Criação</title>

</head>
<body>  
    <h1> Adicionar novos itens </h1><br>
     <form action="createcard.php" method="post">
        <label for="name">Adicionar item: </label>
        <input type="text" name ="nome" id ="nome"><br>

        <label for="name">Adicionar preço: </label>
        <input type="number" name ="preco" id ="nome"><br>

        <label for="name">Disponibilidade: </label>
        <input type="radio" name="disp" id="disponivel" value="disponivel" required>
        <label for="disponivel">Disponivel</label>
        <input type="radio" name="disp" id="ndisponivel" value="não disponivel">
        <label for="disponiveln" >Não disponivel</label><br>
        <button type="submit">Salvar</button>
        <a href="indexcard.php"><button type="button">Cancelar</button></a>
     </form>      
</body>
</html>
