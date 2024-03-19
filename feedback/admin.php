<?php
session_start();

// Verifica se a sessão 'acesso' está definida e corresponde ao valor esperado
if (!isset ($_SESSION['acesso']) || $_SESSION['acesso'] !== 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb') {
    // Se não estiver definida ou não corresponder ao valor esperado, redireciona para a página de login
    header("Location: login.php");
    exit(); // Certifique-se de sair após redirecionar
}

// Se o usuário está logado, você pode continuar com o restante do conteúdo da página admin.php
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Admin</title>
</head>

<body>
    <h1>Bem-vindo à página de administração!</h1>
    <!-- Conteúdo da página admin.php -->
</body>

</html>