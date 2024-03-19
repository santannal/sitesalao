<?php
session_start();

if (!isset ($_SESSION['acesso']) || $_SESSION['acesso'] !== 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb') {

    header("Location: login.php");
    exit();

}

?>
<!DOCTYPE html>

<html lang="pt-br">
<link rel="stylesheet" href="estilo/styleExcluir.css">
<div class="titulofeedback">
    <!-- CABEÇALHO -->
    <span>ADMIN</span>
    <h4>dos Clientes</h4>
</div>
<section class="feedback">
    <tbody>
        <?php
        include_once '../classe/Feedback.php';
        $feed = new Feedback();
        $dados = $feed->listarFirebase();
        if (!empty ($dados)) {
            foreach ($dados as $chave => $mostrar) {
                ?>
                <div class="comentarios-container">
                    <div class="comentarios-box">
                        <div class="box-top">
                            <div class="perfil">
                                <a href="excluir.php?id=<?= $chave ?>">
                                    <img src="../imagem/trash.png" alt="" class="imglixo">
                                </a>


                                <div class="cargo">
                                    <p class="nomefeedback">
                                        <strong>
                                            <?= $mostrar['nome'] ?>
                                        </strong>
                                    </p>
                                    <P class="nomefeedback">
                                        <?= $mostrar['cargo'] ?>
                                </div>
                            </div>

                            <div class="coment">
                                Feedback:
                                <?= $mostrar['descricao'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
</section>
</tbody>

</html>