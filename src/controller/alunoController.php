<?php

//definindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function renderizar(string $nomeDoArquivo, mixed  $dados = null) {
    include "../src/views/{$nomeDoArquivo}.phtml";
    $dados;
    include '../src/views/foot.phtml';
}

function redirecionar(string $onde) {
    header("location: {$onde}");
}

function inicio(): void //estamos declarando que essa funcao "nao tem retorno"
{
    renderizar("inicio");
}

function excluir()
{
    $id = $_GET['id'];  //recuperando o id que tava na url

    excluirAluno($id); //pedindo ao repository pra excluir o aluno (nao sabemos)

    redirecionar('/listar');
}

function listar(): void
{
    //SELECT TODOS
    $alunos = buscarAlunos();
    renderizar("listar",$alunos);

}

function novo(): void
{
    //INSERT INTO
    renderizar("novo");
    if (false === empty($_POST)) {
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if (true === validateForm($nome, $cidade, $matricula)) {
            novoAluno($nome, $cidade, $matricula);
            redirecionar('/listar');
        }
    }
}

function editar(): void
{
    $id = $_GET["id"];
    $aluno = buscarUmAlunos($id);
    renderizar("editar", $aluno);
    if (false === empty($_POST)) {
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if (true === validateForm($nome, $cidade, $matricula)) {
            atualizaraluno($nome, $cidade, $matricula, $id);
            redirecionar('/listar');
        }
    }
}
