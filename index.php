<!-- <?php
session_start();
if (!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit();
}
?> -->
<!DOCTYPE html>
<html lang="pt-BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gerenciador Churrascaria</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-elegant { font-family: 'Marcellus', serif; }
    </style>
</head>
<body class="bg-stone-900 text-stone-100 min-h-screen bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-stone-800 via-stone-900 to-black flex flex-col justify-between">

    <header class="bg-stone-900/60 backdrop-blur-md border-b border-stone-800 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div>
                <h1 class="font-serif-elegant text-xl font-bold tracking-wide text-amber-500">Churrascaria da Luana</h1>
                <p class="text-[10px] text-stone-400 tracking-widest uppercase">Gerenciador Administrativo</p>
            </div>
        </div>
        
        <a href="logout.php" class="inline-flex items-center space-x-2 bg-stone-800 hover:bg-red-900/40 border border-stone-700 hover:border-red-500/50 text-stone-300 hover:text-red-400 px-4 py-2 rounded-xl text-sm font-medium transition duration-200">
            <span>Sair do sistema</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
    </header>

    <main class="max-w-5xl w-full mx-auto p-6 my-auto">
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl md:text-3xl font-semibold text-stone-200">Bem-vindo ao Gerenciador</h2>
            <p class="text-sm text-stone-400 mt-1">Selecione o que deseja administrar abaixo.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <a href="CRUDcard/indexcard.php" class="group bg-stone-800/50 hover:bg-stone-800 border border-stone-700/60 hover:border-amber-500/50 rounded-2xl p-6 shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 text-2xl mb-4 group-hover:scale-110 transition duration-300">
                    🥩
                </div>
                <h3 class="font-serif-elegant text-xl font-bold text-stone-100 group-hover:text-amber-500 transition">Cardápio</h3>
                <p class="text-xs text-stone-400 mt-2 leading-relaxed">Gerencie carnes, guarnições, bebidas e preços do menu.</p>
                <div class="mt-6 flex items-center text-xs font-semibold text-amber-500 tracking-wider uppercase group-hover:translate-x-1 transition-transform">
                    Acessar &rarr;
                </div>
            </a>

            <a href="CRUDmes/indexmes.php" class="group bg-stone-800/50 hover:bg-stone-800 border border-stone-700/60 hover:border-amber-500/50 rounded-2xl p-6 shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 text-2xl mb-4 group-hover:scale-110 transition duration-300">
                    🪑
                </div>
                <h3 class="font-serif-elegant text-xl font-bold text-stone-100 group-hover:text-amber-500 transition">Mesas</h3>
                <p class="text-xs text-stone-400 mt-2 leading-relaxed">Controle de mesas, disponibilidade e status das mesas.</p>
                <div class="mt-6 flex items-center text-xs font-semibold text-amber-500 tracking-wider uppercase group-hover:translate-x-1 transition-transform">
                    Acessar &rarr;
                </div>
            </a>

            <a href="CRUDpedi/indexpedi.php" class="group bg-stone-800/50 hover:bg-stone-800 border border-stone-700/60 hover:border-amber-500/50 rounded-2xl p-6 shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 text-2xl mb-4 group-hover:scale-110 transition duration-300">
                    📝
                </div>
                <h3 class="font-serif-elegant text-xl font-bold text-stone-100 group-hover:text-amber-500 transition">Pedidos</h3>
                <p class="text-xs text-stone-400 mt-2 leading-relaxed">Monitore os pedidos em andamento e o status das mesas.</p>
                <div class="mt-6 flex items-center text-xs font-semibold text-amber-500 tracking-wider uppercase group-hover:translate-x-1 transition-transform">
                    Acessar &rarr;
                </div>
            </a>

        </div>
    </main>

</body>
</html>