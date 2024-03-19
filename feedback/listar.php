<link rel="stylesheet" href="estilo/styleListar.css">
<div class="titulofeedback">
    <!-- CABEÇALHO -->
    <span>Comentários</span>
    <h4>dos Clientes</h4>
</div>
<section class="feedback">
    <a class="btnfeedback" href="salvar.php">COMENTAR</a>
    <tbody>
        <?php
        include_once '../classe/Feedback.php';
        $feed = new Feedback();
        $dados = $feed->listarFirebase();
        if (!empty($dados)) {
            foreach ($dados as $chave => $mostrar) {
                ?>
                <div class="comentarios-container">
                    <div class="comentarios-box">
                        <div class="box-top">
                            <div class="perfil">
                                <img src="../imagem/iconecomentario.png" alt="imagemComentario">
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