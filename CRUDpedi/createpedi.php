<?php 
include '../conexao.php';

session_start();
if (!isset($_SESSION['usuario_id'])){
    header("Location: ../login.php");
    exit();
}
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
    <title>Adicionar Pedidos - Brasa & Tradição</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-elegant { font-family: 'Marcellus', serif; }
    </style>
</head>
<body class="bg-stone-900 text-stone-100 min-h-screen bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-stone-800 via-stone-900 to-black p-4 md:p-8 flex items-center justify-center">

    <div class="max-w-2xl w-full bg-stone-800/40 backdrop-blur-md rounded-2xl border border-stone-700/50 p-6 md:p-8 shadow-2xl">
        
        <div class="border-b border-stone-700/60 pb-5 mb-6">
            <span class="text-amber-500 text-xs font-semibold uppercase tracking-widest block mb-1">Painel Administrativo</span>
            <h1 class="font-serif-elegant text-2xl font-bold text-stone-100 tracking-wide">
                📋 Adicionar novos pedidos
            </h1>
        </div>

        <form action="createpedi.php" method="post" class="space-y-6">
            
            <div>
                <label for="pedido" class="block text-sm font-medium text-stone-300 mb-2">Número da Mesa:</label>
                <input type="number" name="pedido" id="pedido" required min="1"
                       class="w-full bg-stone-900/60 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500/80 focus:ring-1 focus:ring-amber-500/80 transition duration-200"
                       placeholder="Ex: 4">
            </div>

            <div>
                <label for="item" class="block text-sm font-medium text-stone-300 mb-2">Item solicitado:</label>
                <input type="text" name="item" id="item" required
                       class="w-full bg-stone-900/60 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500/80 focus:ring-1 focus:ring-amber-500/80 transition duration-200"
                       placeholder="Ex: Costela ao Molho Barbecue">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-stone-300 mb-2">Status inicial:</label>
                <input type="text" name="status" id="status" required
                       class="w-full bg-stone-900/60 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500/80 focus:ring-1 focus:ring-amber-500/80 transition duration-200"
                       placeholder="Ex: Pendente, Em preparo, Entregue">
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-stone-700/60">
                <a href="indexpedi.php" class="bg-stone-800 hover:bg-stone-700 border border-stone-600/80 text-stone-300 px-5 py-2.5 rounded-xl text-sm font-medium transition duration-200 text-center">
                    Cancelar
                </a>
                <button type="submit" class="bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-500 hover:to-orange-500 text-stone-900 font-bold px-6 py-2.5 rounded-xl text-sm uppercase tracking-wider shadow-lg shadow-orange-950/40 transition duration-200">
                    Salvar
                </button>
            </div>
            
         </form>      
    </div>

</body>
</html>