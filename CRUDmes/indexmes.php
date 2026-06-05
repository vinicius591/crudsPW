<?php 
    include '../conexao.php';

    if(isset($_GET['delete_id'])) {
        $id_delete = $_GET['delete_id'];

        $stmt = $conexao->prepare("DELETE FROM mesas WHERE id = :id ");
        $stmt->bindValue(':id', $id_delete);

        if ($stmt->execute()) {
            header("Location: indexmes.php");
            exit();
        }
    }


    $query = $conexao->prepare("SELECT * FROM mesas");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mesas</title>
</head>
<body>
   <a href="createmes.php"><button>Adicionar mesas </button></a>
    <h1>mesas</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Número das mesas</th>
                <th>Capacidade</th>
                <th>Status</th>
                <th>botões</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['numero_mesa']; ?></td>
                <td><?php echo $item['capacidade']; ?></td>
                <td><?php echo $item['status']; ?></td>
                <td>
                    <a href="updatemes.php?id=<?php echo $item['id']; ?>"><button>Editar</button></a>
                    <a href="indexmes.php?delete_id=<?php echo $item['id'];  ?> "onclick="return confirm('Deseja mesmo excluir?')">
                    <button>Excluir</button></a>


                </td>
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <a href="../index.php"><button> Voltar </button></a>

</body>
</html>
