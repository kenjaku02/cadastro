
<?php
    if(!isset($_SESSION)){
        session_start();
    }
    


    if(isset($_POST['bt_senha'])){
        $senha = $_POST['bt_senha'];
        $rsenha = $_POST['bt_rsenha']; 

        $_SESSION["nome"] = $_POST['bt_nome'];
    }
    
    
    if (isset($senha)){

        if($senha === $rsenha){
            /* Só vai executar os códigos abaixo
            se for VERDADEIRO. */ 
    
            $mensagem= "<div  class='alert alert-success mt-3'> Senha válida </div>";
            
            
            header("Location:banco.php"); /* Mudar de página */
            

            $nome = $_POST['bt_nome'];
            $endereco=$_POST['bt_endereco'];
            $estados=$_POST['estados'];
            $cidade = $_POST['bt_cidades'];
            $telefone =$_POST['bt_telefone'];
            $email =$_POST['bt_email'];
            $cpf = $_POST['bt_cpf'];
            $senha = $_POST['bt_senha'];
            

             $mysqli->query("INSERT INTO tabela_pessoas (nome, endereco, estados, cidades, telefone, email, cpf, senha) values('$nome', '$endereco', '$estados', '$cidade', '$telefone', '$email', '$cpf', '$senha')") or
                die($mysqlierrno);
            
    
        }else{
            
            /* else é o senão */
            /* Quando for falso executar os códigos
            abaixo: */
            $mensagem = "<div class='alert alert-danger mt-3'> Senha inválida </div>";
    
        }
    }
    
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bebidas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="meu_estilo.css">
</head>
<body>
    <div class="container text-center">
        <h1>Cadastro de Bebidas</h1>
    </div>
    <div class="container">
        <form action="" method="post">

            <label for="">Nome:</label>
            <input class="form-control" type="text" name="bt_nome">
            <div class="mb-3">
                <label for="">Preço:</label>
                <input class="form-control" type="text" name="bt_endereco">
            </div>
           
            <label for="">Marca:</label>
            <input class="form-control" type="text">

            <label for="">Descriçao:</label>
            <input class="form-control" type="text">

            <input class="btn btn-success" type="submit" value="Cadastrar">
            <input class="btn btn-danger" type="reset" value="Voltar">

            <?php

                if(isset($mensagem)){
                   
                    echo $mensagem;
                }
               
            ?>


        </form>
    </div>
    
</body>
</html>
