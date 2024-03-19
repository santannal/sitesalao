<?php

class Feedback
{
    //vinculando bd
    private $firebaseURL = 'https://appexemplo-642e2-default-rtdb.firebaseio.com/';
    private $dadosJson;

    //informações que serão salvas
    private $id;
    private $nome;
    private $cargo;
    private $descricao;
    private $con;

    //get
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    /*public function getImagem()
    {
        return $this->imagem;
    } */

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /*public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    } */
    public function getDadosJson()
    {
        return $this->dadosJson;
    }

    public function setDadosJson($dadosJson)
    {
        $this->dadosJson = $dadosJson;
    }

    public function salvarFirebase()
    {
        $tabela = curl_init($this->firebaseURL . 'comentarioCliente.json');

        curl_setopt($tabela, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($tabela, CURLOPT_POSTFIELDS, $this->dadosJson);
        curl_setopt($tabela, CURLOPT_RETURNTRANSFER, true);

        $resposta = curl_exec($tabela);
        curl_close($tabela);
        return $resposta;
    }

    public function listarFirebase()
    {
        $tabela = curl_init($this->firebaseURL . 'comentarioCliente.json');
        curl_setopt($tabela, CURLOPT_RETURNTRANSFER, true);
        $resposta = curl_exec($tabela);
        curl_close($tabela);
        return $dados = json_decode($resposta, true);
    }
}