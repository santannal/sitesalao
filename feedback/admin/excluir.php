<?php
session_start();

if (!isset ($_SESSION['acesso']) || $_SESSION['acesso'] !== 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb') {
    header("Location: login.php");
    exit();
}

include_once '../../classe/Feedback.php';

$chave = filter_input(INPUT_GET, 'id');
if ($chave !== null) {
    $feed = new Feedback();
    if ($feed->excluirFirebase($chave) === 'null') {
        echo 'Excluído com sucesso';
        sleep(2);
        header("Location: admin.php");
        exit();
    } else {
        echo 'Erro ao excluir';
    }
} else {
    echo 'ID inválido';
}
?>
<meta http-equiv="refresh" content="1;URL=?p=feedback/admin">