<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $numero_mesa = $_POST['numero_mesa'];
    $capacidade = $_POST['capacidade'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $stmt = $conexao->prepare("UPDATE mesas SET numero_mesa = :numero_mesa, capacidade = :capacidade, status = :status WHERE id = :id");
    $stmt->bindValue(":numero_mesa", $numero_mesa);
    $stmt->bindValue(":capacidade", $capacidade);
    $stmt->bindValue(":status", $status);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexmes.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $conexao->prepare("SELECT * FROM mesas WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $mesas = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar mesas</title>
</head>
<body>
    <form action="updatemes.php" method="post">
        <input type="hidden" name="id" value="<?php echo $mesas->id; ?>">

        <label for="mesas">Atualizar comida</label><br><br>
        Mesas: <input type="number" name="numero_mesa" value="<?php echo $mesas->numero_mesa; ?>"><br>

        Capacidade: <input type="number" name="capacidade" value="<?php echo $mesas->capacidade; ?>"><br>

        Status: <input type="radio" name="status" value="disponivel" <?php echo ($mesas->status == 'disponivel') ? 'checked' : ''; ?> required>
        <label >disponivel</label>
        <input type="radio" name="status" value="nâo disponivel" <?php echo ($mesas->status == 'não disponivel') ? 'checked' : ''; ?>>
        <label">Não disponivel</label><br>

        <button type="submit">Salvar</button>
        <a href="indexmes.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>