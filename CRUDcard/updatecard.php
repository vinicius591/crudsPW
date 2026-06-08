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
    <title>Atualizar Item - Brasa & Tradição</title>
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
                📝 Atualizar comida
            </h1>
        </div>

        <form action="updatecard.php" method="post" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $card->id; ?>">
            
            <div>
                <label for="nome" class="block text-sm font-medium text-stone-300 mb-2">Comida / Corte:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $card->nome; ?>" required
                       class="w-full bg-stone-900/60 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500/80 focus:ring-1 focus:ring-amber-500/80 transition duration-200">
            </div>

            <div>
                <label for="preco" class="block text-sm font-medium text-stone-300 mb-2">Preço (R$):</label>
                <input type="number" name="preco" id="preco" step="0.01" value="<?php echo $card->preco; ?>" required
                       class="w-full bg-stone-900/60 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500/80 focus:ring-1 focus:ring-amber-500/80 transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-stone-300 mb-3">Disponibilidade:</label>
                <div class="flex flex-col sm:flex-row gap-4 bg-stone-900/40 p-4 rounded-xl border border-stone-700/40">
                    
                    <label class="flex items-center cursor-pointer group">
                        <input type="radio" name="disp" id="matutino" value="disponivel" <?php echo ($card->disponivel == 'disponivel') ? 'checked' : ''; ?> required
                               class="w-4 h-4 text-amber-600 bg-stone-900 border-stone-700 focus:ring-amber-500 focus:ring-offset-stone-900 accent-amber-500">
                        <span class="ml-2 text-sm text-stone-300 group-hover:text-stone-100 transition duration-150">Disponível</span>
                    </label>

                    <label class="flex items-center cursor-pointer group">
                        <input type="radio" name="disp" id="vespertino" value="não disponivel" <?php echo ($card->disponivel == 'não disponivel' || $card->disponivel == 'nâo disponivel') ? 'checked' : ''; ?>
                               class="w-4 h-4 text-amber-600 bg-stone-900 border-stone-700 focus:ring-amber-500 focus:ring-offset-stone-900 accent-amber-500">
                        <span class="ml-2 text-sm text-stone-300 group-hover:text-stone-100 transition duration-150">Não disponível</span>
                    </label>
                    
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-stone-700/60">
                <a href="indexcard.php" class="bg-stone-800 hover:bg-stone-700 border border-stone-600/80 text-stone-300 px-5 py-2.5 rounded-xl text-sm font-medium transition duration-200 text-center">
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