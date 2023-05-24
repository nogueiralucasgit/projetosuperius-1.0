<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco= "SUPERIUS";

// Cria conexão com o banco de dados
$conexao= mysqli_connect ($host, $user, $pass,$banco) or die("Erro ao conectar ao banco de dados.");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Obtém os valores dos campos do formulário
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $caminho = $_POST["caminho"];
  $preco = $_POST["preco"];

  // Valida os valores dos campos do formulário
  $errors = array();  

  if (empty($nome)) {
    $errors[] = "O campo nome é obrigatório.";
  }

  if (empty($descricao)) {
    $errors[] = "O campo senha é obrigatório.";
  }
  if (empty($caminho)) {
    $errors[] = "O campo senha é obrigatório.";
  }

  if (empty($preco)) {
    $errors[] = "O campo email é obrigatório.";
  }

 

  // Se não houver erros de validação, insere os dados no banco de dados
  if (empty($errors)) {

    // Cria a consulta SQL para inserir os dados na tabela cliente
    $sql = "INSERT INTO PRODUTOS (sDsNome, sDsCaminho, sDsDescricao, sNmPreco) VALUES ('$nome', '$descricao', '$caminho', '$preco')";

    // Executa a consulta SQL
    if (mysqli_query($conexao, $sql)) {
      echo "Cadastro realizado com sucesso.";
    } else {
      echo "Erro ao cadastrar o cliente: " . mysqli_error($conexao);
    }

  } else {

    // Se houver erros de validação, exibe-os na tela
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }

  }

}

?>
