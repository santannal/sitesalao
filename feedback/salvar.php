<?php

$id = filter_input(INPUT_GET, 'id');
include_once '../classe/Feedback.php';
$feed = new Feedback();

?>
<link rel="stylesheet" href="estilo/styleSalvar.css">
<div class="display-form">
<form method="post" enctype="multipart/form-data" name="frmCadastro" id="frmCadastro">
    <h3 class="titulo">ADICIONAR FEEDBACK</h3>
    <table class="formulario">
        <tr>
            <td>Email:</td>
            <td><input type="email" name="txtnome" required>
        </tr>
        <tr>
            <td>Cargo:</td>
            <td><input type="text" name="txtcargo" required></td>
        </tr>
        <tr>
            <td>Descrição:</td>
            <td><textarea name="txtdescricao" required></textarea></td>
        </tr>
        <!--
        <tr>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="star5"><label for="star5"><i
                        class="bi bi-star"></i></label>
                <input type="radio" name="rating" value="4" id="star4"><label for="star4"></label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3"></label>
                <input type="radio" name="rating" value="2" id="star2"><label for="star2"></label>
                <input type="radio" name="rating" value="1" id="star1"><label for="star1"></label>
            </div>
        </tr>
-->
        <tr>
            <td colspan="2"><input type="submit" value="Enviar" name="btnsalvar"></td>
        </tr>
    </table>
</form>
</div>
<?php

if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $cargo = filter_input(INPUT_POST, 'txtcargo');
    $descricao = filter_input(INPUT_POST, 'txtdescricao');

    $email_existente = $feed->emailExistente($nome);

    if ($email_existente) {
        ?>
        <section>
            <div class="alert alert-2-success">
                <h3 class="alert-title">ERRO AO ENVIAR FEEDBACK</h3>
                <p class="alert-content">O E-mail inserido já corresponde a um já utilizado,
                    <br> tente um outro.
                </p>
            </div>
        </section>
        <?php
    } else {
        $dados = array(
            'nome' => $nome,
            'cargo' => $cargo,
            'descricao' => $descricao,
        );

        $feed->setDadosJson(json_encode($dados));
        $salvarFirebase = $feed->salvarFirebase();

        if ($email_existente == false) {
            ?>
            <section>
                <div class="alert alert-2-success">
                    <h3 class="alert-title">Feedback enviado!</h3>
                    <p class="alert-content">Obrigado pela participação.</p>
                </div>
            </section>
            <?php

            sleep(5);
            header("Location: listar.php");
            exit();
        } else {
            echo $email_existente;
            return 0;
        }
    }
}


