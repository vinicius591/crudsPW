<?php
session_start(); 

if (isset($_SESSION['erro_login'])) {
    unset($_SESSION['erro_login']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Churrascaria - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-elegant { font-family: 'Marcellus', serif; }
    </style>
</head>
<body class="bg-stone-900 text-stone-100 flex items-center justify-center min-h-screen p-4 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-stone-800 via-stone-900 to-black">

    <div class="bg-stone-800/80 backdrop-blur-md p-8 rounded-2xl shadow-2xl border border-stone-700/50 w-full max-w-md transform transition-all">
        
        <div class="text-center mb-8">
            <div class="inline-flex ">
                
            </div>
            <h1 class="font-serif-elegant text-3xl font-bold tracking-wide text-amber-500">
                Churrascaria da Luana
            </h1>
            <p class="text-xs text-stone-400 mt-1 uppercase tracking-widest">Churrascaria & Bar</p>
            
            <h2 class="text-lg font-medium text-stone-200 mt-6">
                Acesse sua conta
            </h2>
        </div>
        
        <form action="logicalogin.php" method="post" class="space-y-5">
            <div>
                <label for="usuario" class="block text-xs font-semibold text-stone-400 uppercase tracking-wider mb-2">
                    E-mail
                </label>
                <input type="email" name="usuario" id="usuario" required placeholder="seu@email.com"
                    class="w-full bg-stone-900/50 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition duration-200">
            </div>
            
            <div>
                <label for="senha" class="block text-xs font-semibold text-stone-400 uppercase tracking-wider mb-2">
                    Senha
                </label>
                <input type="password" id="senha" name="senha" placeholder="••••••••" required 
                    class="w-full bg-stone-900/50 border border-stone-700 rounded-xl px-4 py-3 text-stone-100 placeholder-stone-500 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition duration-200">
            </div>
            
            <button type="submit" 
                class="w-full bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-500 hover:to-orange-500 text-stone-900 font-bold uppercase tracking-wider py-3.5 px-4 rounded-xl shadow-lg shadow-orange-950/40 transition duration-300 transform active:scale-[0.98]">
                Entrar no Gerenciador
            </button>
        </form>

       
    </div>

</body>
</html>