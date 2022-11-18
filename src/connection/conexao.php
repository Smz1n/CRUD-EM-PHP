<?php 

function abrirConexao (): PDO
{
    $servidor = 'localhost';
    $usuario = 'seu usuario';
    $senha = 'sua senha';
    $banco = 'seu banco de dados';

    $conexao = new PDO("mysql:host={$servidor};dbname={$banco}", $usuario, $senha);

    return $conexao;
}