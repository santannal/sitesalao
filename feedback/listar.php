<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR PHP</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="estilo/styleListar.css">
</head>

<body>

    <header>
        <nav class="navigate">
            <a href="#" class="logo">ROGÉRIO <span class="logober">BARBEIRO</span></a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="..">Página inicial</a></li>
                <li class="nav-item"><a href="#">Produtos</a></li>
                <li class="nav-item"><a href="#">Feedbacks</a></li>
                <li class="nav-item"><a href="#">Contato</a></li>
            </ul>
        </nav>
    </header>

    <div class="backfeedback">
        <div class="titulofeedback">
            <span>Comentários</span>
            <h4>dos Clientes</h4>
        </div>
        <section class="feedback">
            <a class="btnfeedback" href="salvar.php">COMENTAR</a>
            <!-- Conteúdo PHP que gera os elementos com a classe .comentarios-container -->
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
                                        <p class="nomefeedback">
                                            <?= $mostrar['cargo'] ?>
                                        </p>
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
    </div>

    <script>

        window.animacao = ScrollReveal({ reset: true });
        animacao.reveal('.comentarios-container', {
            duration: 2600
        });

        animacao.reveal('.titulofeedback', {
            duration: 2600
        });

        animacao.reveal('.btnfeedback', {
            duration: 2600
        });

        animacao.reveal('.nav-menu', {
            duration: 1500
        });

        animacao.reveal('.logo', {
            duration: 1500
        });

    </script>

</body>

</html>