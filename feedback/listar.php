<link rel="stylesheet" href="estilo/styleListar.css">
<header>

    <nav class="navigate">
        <a href="#" class="logo">ROGÉRIO <span class="logober">BARBEIRO</span></a>
        <ul class="nav-menu">
            <li class="nav-item"><a href="../index.html">Página inicial</a></li>
            <li class="nav-item"><a href="#">Produtos</a></li>
            <li class="nav-item"><a href="#">Feedbacks</a></li>
            <li class="nav-item"><a href="#">Contato</a></li>
        </ul>
        <!--
        <div class="menu">
            <span class="pos"></span>
            <span class="pos"></span>
            <span class="pos"></span>
        </div> -->
    </nav>

</header>

<div class="backfeedback">
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
            if (!empty ($dados)) {
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
</div>
</section>
</tbody>