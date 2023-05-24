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
  $senha = $_POST["senha"];
  $email = $_POST["email"];
  $cpf = $_POST["cpf"];
  $estado = $_POST["estado"];

  // Valida os valores dos campos do formulário
  $errors = array();

  if (empty($nome)) {
    $errors[] = "O campo nome é obrigatório.";
  }

  if (empty($senha)) {
    $errors[] = "O campo senha é obrigatório.";
  }

  if (empty($email)) {
    $errors[] = "O campo email é obrigatório.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "O email informado é inválido.";
  }

  if (empty($cpf)) {
    $errors[] = "O campo CPF é obrigatório.";
  } else if (!preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/", $cpf)) {
    $errors[] = "O CPF informado é inválido.";
  }

  if (empty($estado)) {
    $errors[] = "O campo estado é obrigatório.";
  }

  // Se não houver erros de validação, insere os dados no banco de dados
  if (empty($errors)) {

    // Cria a consulta SQL para inserir os dados na tabela cliente
    $sql = "INSERT INTO cliente (sDsNome, sDsSenha, sDsEmail, sDsCpf, sDsEstado) VALUES ('$nome', '$senha', '$email', '$cpf', '$estado')";

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
