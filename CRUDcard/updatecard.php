<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $disp = $_POST['disp'];
    $id = $_POST['id'];
    $stmt = $conexao->prepare("UPDATE cardapio SET nome = :nome, preco = :preco, disponivel = :disponivel WHERE id = :id");
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":preco", $preco);
    $stmt->bindValue(":disponivel", $disp);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexcard.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $conexao->prepare("SELECT * FROM cardapio WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $card = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar itens</title>
</head>
<body>
    <form action="updatecard.php" method="post">
        <input type="hidden" name="id" value="<?php echo $card->id; ?>">

        <label for="name">Atualizar comida</label><br><br>
        Comida: <input type="text" name="nome" value="<?php echo $card->nome; ?>"><br>

        Preço: <input type="number" name="preco" value="<?php echo $card->preco; ?>"><br>

        Disponibilidade: <input type="radio" name="disp" id="matutino" value="disponivel" <?php echo ($card->disponivel == 'disponivel') ? 'checked' : ''; ?> required>
        <label for="matutino">Disponivel</label>
        <input type="radio" name="disp" id="vespertino" value="nâo disponivel" <?php echo ($card->disponivel == 'não disponivel') ? 'checked' : ''; ?>>
        <label for="vespertino">Não disponivel</label><br>

        <button type="submit">Salvar</button>
        <a href="indexcard.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>