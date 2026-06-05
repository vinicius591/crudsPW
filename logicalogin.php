<?php
session_start();
require_once "conexao.php"; 

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if (!empty($usuario) && !empty($senha)) {
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindValue(':usuario', $usuario);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $dados_usuario = $stmt->fetchObject();

        if ($senha === $dados_usuario->senha) {
            $_SESSION['usuario_id'] = $dados_usuario->id;
            $_SESSION['usuario_nome'] = $dados_usuario->nome;
            header("Location: index.php");
            exit();
            
        } else {
            echo "Senha ou usuário incorreto!";
        }
        
    } else {
        $_SESSION['erro_login'] = "Usuário não encontrado!";
        header("Location: login.php");
        exit();
    }
    
} else {
    echo "Preencha todos os campos!";
}
?>