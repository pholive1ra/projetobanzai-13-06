<?php

    if (isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $nomeMaterno = $_POST['nomeMaterno'];
        $cep = $_POST['cep'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $nascimento = $_POST['nascimento'];
        $genero = $_POST['genero'];
        $emailCadastrado = "email já está cadastrado!";
        $telCadastrado = "Telefone já cadastrado!";

        $sqlEmail = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultEmail = $conexao->query($sqlEmail);

        $sqlTelefone = "SELECT * FROM usuarios WHERE telefone = '$telefone'";
        $resultTelefone = $conexao->query($sqlTelefone);

        if (mysqli_num_rows($resultEmail) > 0)
        {
            echo '<script>alert("'.$emailCadastrado.'");</script>';
        }
        else if (mysqli_num_rows($resultTelefone) > 0) 
        {
            echo '<script>alert("'.$telCadastrado.'");</script>';
        }
        else
        {
          
           // Define 'usuario comum' para novos registros
        $tipo_usuario = 'usuario comum';

            $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha, telefone, data_nasc, genero, nome_mae, cep, cpf,tipo_usuario) 
            VALUES ('$nome', '$email', '$senha', '$telefone', '$nascimento', '$genero', '$nomeMaterno', '$cep', '$cpf','$tipo_usuario')");

            header('Location: login.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logineregister.css">
    

    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Nunito+Sans&family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">

    <title>Register</title>
</head>
<body>
    <section class="login">

        <div class="imagem-login">
            <img src="assets/logobanzai.png">
        </div>

        <div class="informacoes-login">
            <form action="register.php" method="post">

                <h2>Cadastro</h2>
                <h3 class="mensagem">Preencha os campos abaixo.</h3>
                <div class="infos">
                    <input type="text" name="nome" class="nome" placeholder="Preencha seu nome" required>
                    <input type="text" name="nomeMaterno" class="nome" placeholder="Preencha nome materno" required>
                    <input type="email" onblur="validacaoEmail(f1.email)" name="email" class="email" placeholder="Preencha seu E-mail" required>
                    <input type="password" name="senha" class="senha" placeholder="Preencha sua senha" required>
                    <input type="password" name="confirmar-senha" class="confirmar-senha" placeholder="Confirmar senha" required>
                    <input type="tel" minlength="11" maxlength="15" onkeyup="handlePhone(event)" name="telefone" id="telefone" placeholder="Preencha seu Telefone celular" required> 
                    <input type="date" name="nascimento" id="nascimento" required>
                    <input type="text" name="cpf" id="cpf" placeholder="Preencha seu CPF" required>
                    <input type="text" name="cep" id="cep" placeholder="Preencha seu CEP" required>
                    <input type="text" name="cep" id="cep" placeholder="Preencha Endereço" required>
                    
                    <div class="sexo">
                        <p>Gênero</p>
                        <div class="box-sexo">
                            <input type="radio" id="feminino" name="genero" value="feminino" required>
                            <label for="feminino">Feminino</label>
                        </div>
                    <br>
                        <div class="box-sexo">
                            <input type="radio" id="masculino" name="genero" value="masculino" required>
                            <label for="masculino">Masculino</label>
                        </div>
                    <br>
                        <div class="box-sexo">
                            <input type="radio" id="outro" name="genero" value="outro" required>
                            <label for="outro">Outro</label>                        
                        </div>
                    </div>
                </div>
                <h3 class="sem-conta">já possui conta?<a href="./login.php"> Logar</a></h3>
                <input type="submit" name="submit" id="submit" value="Cadastrar">

            </form>
        </div>
    </section>
    <script src="./js/telefone.js"></script>
</body>
</html>