<?php

include("conexao.php");

try {
  if ($_POST) {
    extract($_POST);

    $sql = "INSERT INTO cadastro (descricao, unidade, valor, desconto, estoque)
            values ('$descricao', '$unidade', '$valor', '$desconto', '$estoque')";
    $res = mysqli_query($con, $sql);
    $retorno = array();

    if ($res == false) {
      throw new Exception("Erro ao inserir produto");  

    } else {
      $retorno['resp'] = true;
      $retorno['msg'] = "Produto inserido com sucesso";
    }
  }
  die(json_encode($retorno));
} catch (Exception $e) {

  $retorno = array();
  $retorno['resp'] = false;
  $retorno['msg'] = $e->getMessage();
  die(json_encode($retorno));
}
/*
if($descricao == '' || $valor == '' || $estoque == ''){
  throw new Exception("Campos com * são obrigatórios"); 
}

if($descricao == ''){
  throw new Exception("Campo descricao obrigatório"); 
}

if($valor == ''){
  throw new Exception("Campo valor obrigatório"); 
}

if($estoque == ''){
  throw new Exception("Campo estoque obrigatório"); 
}

*/