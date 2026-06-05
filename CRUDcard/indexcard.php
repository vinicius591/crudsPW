<?php 
    include '../conexao.php';

    if(isset($_GET['delete_id'])) {
        $id_delete = $_GET['delete_id'];

        $stmt = $conexao->prepare("DELETE FROM cardapio WHERE id = :id ");
        $stmt->bindValue(':id', $id_delete);

        if ($stmt->execute()) {
            header("Location: indexcard.php");
            exit();
        }
    }


    $query = $conexao->prepare("SELECT * FROM cardapio");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardapio</title>
</head>
<body>
   <a href="createcard.php"><button> Adicionar comida </button></a>
    <h1>Cardapio</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>preço</th>
                <th>disponibilidade</th>
                <th>botões</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['preco']; ?></td>
                <td><?php echo $item['disponivel']; ?></td>
                <td>
                    <a href="updatecard.php?id=<?php echo $item['id']; ?>"><button>Editar</button></a>
                    <a href="indexcard.php?delete_id=<?php echo $item['id'];  ?> "onclick="return confirm('Deseja mesmo excluir')">
                    <button>Excluir</button></a>


                </td>
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <a href="../index.php"><button> Voltar </button></a>

</body>
</html>
