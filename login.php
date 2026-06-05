<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>
        Faça seu login
    </h2>
    <form action="logicalogin.php" method="post">
        <label for="usuario">Usuário</label>
        <input type="email" name="usuario" id="usuario" required
        placeholder="seu@email.com">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="..." required >
        <button type="submit">Entrar</button>
    </form>
</body>
</html>