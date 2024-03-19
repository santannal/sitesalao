<?php

$id = filter_input(INPUT_GET, 'id');
include_once '../classe/Feedback.php';
$feed = new Feedback();

if (isset ($id)) {

    $feed->setId($id);
    foreach ($dados as $mostrar) {
        $id = $mostrar['id'];
        $nome = $mostrar['nome'];
        $cargo = $mostrar['cargo'];
        $descricao = $mostrar['descricao'];
    }
}

?>
<link rel="stylesheet" href="estilo/styleSalvar.css">

<form method="post" enctype="multipart/form-data" name="frmCadastro" id="frmCadastro">
    <h3 class="titulo">ADICIONAR FEEDBACK</h3>
    <table class="formulario">
        <tr>
            <td>Email:</td>
            <td><input type="text" name="txtnome" required>
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

<?php

if (filter_input(INPUT_POST, 'btnsalvar')) {
    //capturei dados do form HTML para variáveis
    $nome = filter_input(INPUT_POST, 'txtnome');
    $cargo = filter_input(INPUT_POST, 'txtcargo');
    $descricao = filter_input(INPUT_POST, 'txtdescricao');

    //inicio salvar com firebase 
    $dados = array(
        'nome' => $nome,
        'cargo' => $cargo,
        'descricao' => $descricao,
    );

    $feed->setDadosJson(json_encode($dados));

    $msg = $feed->salvarFirebase() === true ? 'Erro' : 'Salvo com sucesso';


    echo '<div id="alert-msg" class="custom-alert mt-3">'
        . 'SALVO COM SUCESSO'
        . '</div>';


    // Aguarda 2 segundos antes de redirecionar
    sleep(2);
    header("Location: listar.php");
    exit();
}