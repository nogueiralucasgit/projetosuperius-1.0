<html>
<head>
<!-- JAVASCRIPT -->

<script type="text/javascript">
    function Logar(){setTimeout("window.location='../index.php'",2000);}
</script>

</head>

<!-- ESTILO - CSS -->
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,700&display=swap');

    body{
        background-image: url('bgnovo.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: montserrat;
        overflow: hidden;
    }

    .exibicao{
        width: 600px;
        height: 400px;
        background-color: rgba(138, 43, 227,0.5);
        border-radius: 50px;
        padding: 60px;
        margin: 0 auto;
        color: white;
        text-align: center;
        margin: 150px auto;
    }
    h1{
        font-size: 22px;
        padding: 10px 0;
        margin: 20px 0;       
        margin-bottom: 60px;
    }
    h1 b{
        color: yellow;
    }
    p{
        font-size: 14px;
        margin-top: 60px;
        font-weight: normal;
    }
</style>

<!-- MARCAÇÃO HTML -->

<div class="exibicao">
<div class="bg" style="background-image: url('/imagens/background/bgnovo.png');"></div>

<!-- BACKEND - PHP -->
<?php
$email=$_POST['txtemail'];
$senha=$_POST['txtsenha'];

//conectar o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$banco= "SUPERIUS";

// Cria conexão com o banco de dados
$conexao= mysqli_connect ($host, $user, $pass,$banco) or die("Erro ao conectar ao banco de dados.");

//abre sua tabela e consulta os dados
$query = "SELECT * FROM CLIENTE where sDsEmail='$email' and sDsSenha='$senha'";
$sql = mysqli_query ($conexao,$query) or die("erro2");
//pega os dados e consulta a senha
$cont = mysqli_num_rows ($sql);
echo "<h1> Olá, <b>$email</b> tudo bem?<br>";
if ($cont==1) {
    session_start();
	$_SESSION['sDsEmail']=$email;
	$_SESSION['sDsSenha']=$senha;
    echo "<h2>Senha correta!</h2>";
   echo "<script>Logar()</script>";
    exit;}
    else{
          
      echo "<font color='red'>Senha incorreta</font>";
      echo "<script>loginoff()</script>";
    }

?>

<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime accusantium, ut nulla illum mollitia alias? Voluptatibus vero expedita porro laborum. Doloribus, beatae debitis ut repudiandae cumque obcaecati nihil quos quidem!</p>
 
 </div> <!-- exibicao -->

 <!-- arquivo login.php -->

<html>
<head>
    <script type="text/javascript">
        // Função para redirecionar o usuário para o painel do cliente após o login
        function logarCliente() {
            setTimeout("window.location='index.html'", 3000);
        }
        
    </script>
</head>


</body>
    <?php
    // Recebe os dados do formulário de login
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];

    // Define as informações de conexão com o banco de dados
    $host = "localhost";     // endereço do servidor
    $user = "seu_usuario";   // nome de usuário do banco de dados
    $pass = "sua_senha";     // senha do banco de dados
    $banco = "nome_do_banco"; // nome do banco de dados a ser usado

    // Conecta ao banco de dados usando mysqli
    $conexao = mysqli_connect($host, $user, $pass, $banco) or die("Erro ao conectar ao banco de dados");

    // Consulta a tabela de clientes para verificar se o usuário é um cliente válido
    $query = "SELECT * FROM tb_cliente WHERE email = '$email' AND senha = '$senha'";
    $sql = mysqli_query($conexao, $query) or die("Erro ao consultar o banco de dados");

    // Obtém o número de resultados da consulta
    $cont = mysqli_num_rows($sql);

    // Se o usuário for um cliente válido, inicia a sessão e redireciona para o painel do cliente
    if ($cont == 1) {
        session_start();        // Inicia a sessão
        $_SESSION['email'] = $email;   // Armazena o email do usuário na sessão
        $_SESSION['senha'] = $senha;   // Armazena a senha do usuário na sessão

        // Exibe uma mensagem de sucesso para o usuário e redireciona para o painel do cliente
        echo "Olá, cliente <b>$email</b>!<br>";
        echo "<font color='green'>Senha correta</font>";
        echo "<script>logarCliente()</script>";
        exit;
    }
    else {
        // Se o usuário não for um cliente válido, consulta a tabela de ADMs para verificar se o usuário é um ADM válido
        $query = "SELECT * FROM tb_adm WHERE email = '$email' AND senha = '$senha'";
        $sql = mysqli_query($conexao, $query) or die("Erro ao consultar o banco de dados");

        // Obtém o número de resultados da consulta
        $cont = mysqli_num_rows($sql);

        // Se o usuário for um ADM válido, inicia a sessão e redireciona para o painel do ADM
        if ($cont == 1) {
            session_start();        // Inicia a sessão
            $_SESSION['email'] = $email;   // Armazena o email do usuário na sessão
           
        }
    }

            /* Esse código implementa a autenticação de um usuário em um sistema web. Ele verifica se o email e senha
             fornecidos pelo usuário correspondem a um registro na tabela "tb_cliente" do banco de dados. Se a autenticação 
             for bem sucedida, a página é redirecionada para "painelcliente.php". Caso contrário, o código verifica se o email
              e senha correspondem a um registro na tabela "tb_adm" do banco de dados. Se a autenticação for bem sucedida, a ]
              página é redirecionada para "paineladm.php". Caso contrário, a página é redirecionada para "login.html". 
              Para utilizar esse código, é necessário alterar as informações do banco de dados, como o nome do host, usuário, 
              senha e nome do banco. Também é necessário criar as tabelas "tb_cliente" e "tb_adm" com as colunas correspondentes 
              aos dados de login. Além disso, é necessário criar as páginas "painelcliente.php", "paineladm.php" e "login.html". */