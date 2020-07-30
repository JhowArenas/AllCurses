  <?php
  $conecta = mysqli_connect("localhost", "jhow", "#tcc_*", "tcc_");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    if(isset($_POST["user"])) {
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $codigoCidade = $_POST['codigoCidade'];
        $cep = $_POST['cep'];
        $contato1 = $_POST['contato1'];
        $contato2 = $_POST['contato2'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $senha = $_POST['senha'];
        
        $inserir    = "INSERT INTO faculdades ";
        $inserir    .= "(nome,endereco,numero,codigoCidade,cep,contato1,contato2,email,user,senha) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$endereco','$numero', $codigoCidade,$cep,$contato1,$contato2,$email,$user,$senha)";

        $operacao_insercao = mysqli_query($conecta, $inserir);

        $retorno = array ();
        if($operacao_insercao){
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Transportadora inserida com sucesso. ";
        }
        else{
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente novamente mais tarde. ";
        }

        echo json_encode($retorno);
    }
?>