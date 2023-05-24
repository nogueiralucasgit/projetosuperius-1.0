<?php
  // Conecta ao banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "SUPERIUS";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica a conexão
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Consulta SQL SELECT
  $sql = "SELECT * FROM produtos WHERE sDsPreco = 1000" ;
  $result = $conn->query($sql);

  // Exibe os resultados
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='item'>";
      echo "<div id='img'><img src='".$row['imagem']."' alt=''></div>";
      echo "<div id='descricao'><p>".$row['descricao']."</p></div>";
      echo "<div id='preco'><p>R$ ".$row['preco']."</p></div>";
      echo "<div id='sbProduto'><input type='button' value='COMPRAR'></div>";
      echo "</div>";
    }
  } else {
    echo "Nenhum resultado encontrado.";
  }

  // Fecha a conexão
  $conn->close();
?>
