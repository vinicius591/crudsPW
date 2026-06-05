<?php
session_start();
if (!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Sistema Gerenciador Churrascaria</title>
</head>
<body>     
    <a href="CRUDcard/indexcard.php"><button type="submit">Cardapio</button></a>
    <a href="CRUDmes/indexmes.php"><button type="submit">Mesas</button></a>
    <a href="CRUDpedi/indexpedi.php"><button type="submit">Pedidos</button></a>
    <a href="logout.php"><button type="submit">Sair do sistema</button></a>
</body>
</html>