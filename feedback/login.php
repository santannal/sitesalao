<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="estilo/styleLogin.css" rel="stylesheet">

    <title>Acesso ao sistema</title>

</head>

<body>

    <div class="container">
        <div class="imagemlogin">
            <img src="../imagem/usuario.png" alt="imagem do usuario" class="imglog">
        </div>
        <form id="loginForm" method="post" class="formulariologin">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="txtemail" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="txtsenha" required>
            </div>
            <div class="form-group">
                <input type="submit" value="LOGIN" name="btnlogar">
            </div>
        </form>
    </div>

</body>

</html>
<?php
if (filter_input(INPUT_POST, 'btnlogar')) {
    $email = filter_input(INPUT_POST, 'txtemail');
    $senha = filter_input(INPUT_POST, 'txtsenha');

    if ($email == 'teste@teste.com' && $senha == '123') {

        session_start();
        $_SESSION['acesso'] = 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb';
        header("location:admin.php");

    } else {
        echo '<div id="alert-msg" class="custom-alert mt-3">'
            . 'TENTATIVA INCORRETA'
            . '</div>';

        header("Location: login.php");
        exit();
    }
}
