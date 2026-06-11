<?php 
    include '../conexao.php';
    session_start();
if (!isset($_SESSION['usuario_id'])){
    header("Location: ../login.php");
    exit();
}

    if(isset($_GET['delete_id'])) {
        $id_delete = $_GET['delete_id'];

        $stmt = $conexao->prepare("DELETE FROM pedidos WHERE id = :id ");
        $stmt->bindValue(':id', $id_delete);

        if ($stmt->execute()) {
            header("Location: indexpedi.php");
            exit();
        }
    }

    $query = $conexao->prepare("SELECT * FROM pedidos");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pedidos - Brasa & Tradição</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-elegant { font-family: 'Marcellus', serif; }
    </style>
</head>
<body class="bg-stone-900 text-stone-100 min-h-screen bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-stone-800 via-stone-900 to-black p-4 md:p-8">

    <div class="max-w-6xl w-full mx-auto bg-stone-800/40 backdrop-blur-md rounded-2xl border border-stone-700/50 p-6 shadow-2xl">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-stone-700/60 pb-6 mb-6 gap-4">
            <div>
                <span class="text-amber-500 text-xs font-semibold uppercase tracking-widest block mb-1">Painel Administrativo</span>
                <h1 class="font-serif-elegant text-3xl font-bold text-stone-100 tracking-wide">
                    📋 Controle de <span class="text-amber-500">Pedidos</span>
                </h1>
            </div>
            
            <div class="flex items-center space-x-3">
                <a href="../index.php" class="bg-stone-800 hover:bg-stone-700 border border-stone-600 text-stone-300 px-4 py-2.5 rounded-xl text-sm font-medium transition duration-200">
                    &larr; Voltar ao Menu
                </a>
                <a href="createpedi.php" class="bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-500 hover:to-orange-500 text-stone-900 font-bold px-5 py-2.5 rounded-xl text-sm uppercase tracking-wider shadow-lg shadow-orange-950/40 transition duration-200">
                    + Adicionar Pedido
                </a>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-stone-700/40 bg-stone-900/40">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-900 text-stone-400 border-b border-stone-700/60 text-xs font-semibold uppercase tracking-wider">
                        <th class="py-4 px-6 w-16 text-center">ID</th>
                        <th class="py-4 px-6 w-32">Mesa</th>
                        <th class="py-4 px-6">Item Solicitado</th>
                        <th class="py-4 px-6 text-center w-40">Status</th>
                        <th class="py-4 px-6 text-center w-48">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-800 text-sm">
                    <?php if (empty($lista)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-stone-500 italic">
                                Nenhum pedido em andamento no momento.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($lista as $item): ?>
                        <tr class="hover:bg-stone-800/30 transition duration-150">
                            <td class="py-4 px-6 text-center font-mono text-stone-500">
                                #<?php echo $item['id']; ?>
                            </td>
                            
                            <td class="py-4 px-6 font-semibold text-amber-500">
                                Mesa <?php echo htmlspecialchars($item['mesa']); ?>
                            </td>
                            
                            <td class="py-4 px-6 font-medium text-stone-200">
                                <?php echo htmlspecialchars($item['item']); ?>
                            </td>
                            
                            <td class="py-4 px-6 text-center">
                                <?php 
                                    $statusPedi = mb_strtolower(trim($item['status']));
                                    
                                    if ($statusPedi == 'pendente' || $statusPedi == 'recebido'): 
                                ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                        ● Pendente
                                    </span>
                                <?php elseif ($statusPedi == 'em preparo' || $statusPedi == 'preparando'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                        ● Em Preparo
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-500/10 text-green-400 border border-green-500/20">
                                        ● Entregue
                                    </span>
                                <?php endif; ?>
                            </td>
                            
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="updatepedi.php?id=<?php echo $item['id']; ?>" 
                                       class="bg-stone-800 hover:bg-stone-700 text-stone-300 border border-stone-600/80 px-3 py-1.5 rounded-lg text-xs font-medium transition duration-150">
                                        Editar
                                    </a>
                                    <a href="indexpedi.php?delete_id=<?php echo $item['id']; ?>" 
                                       onclick="return confirm('Deseja mesmo excluir este pedido?')"
                                       class="bg-red-950/40 hover:bg-red-900/60 text-red-400 border border-red-900/60 px-3 py-1.5 rounded-lg text-xs font-medium transition duration-150">
                                        Excluir
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>