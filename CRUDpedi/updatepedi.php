<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mesa = $_POST['mesa'];
    $item = $_POST['item'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $stmt = $conexao->prepare("UPDATE pedidos SET mesa = :mesa, item = :item, status = :status WHERE id = :id");
    $stmt->bindValue(":mesa", $mesa);
    $stmt->bindValue(":item", $item);
    $stmt->bindValue(":status", $status);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexpedi.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $conexao->prepare("SELECT * FROM pedidos WHERE id = :id");
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
    <title>Atualizar pedido</title>
</head>
<body>
    <form action="updatepedi.php" method="post">
        <input type="hidden" name="id" value="<?php echo $mesas->id; ?>">

        <label for="mesas">Atualizar pedido</label><br><br>
        Mesas: <input type="number" name="mesa" value="<?php echo $mesas->mesa; ?>"><br>

        item: <input type="text" name="item" value="<?php echo $mesas->item; ?>"><br>

        Status: <input type="text" name="status" value="<?php echo $mesas->status; ?>" required><br>

        <button type="submit">Salvar</button>
        <a href="indexpedi.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>