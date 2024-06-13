
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

    <title>Login</title>
</head>
<body>
    <section class="login">

        <div class="imagem-login">
        <img src="assets/logobanzai.png">
        </div>

        <form action="./configLogin.php" method="POST">
        <div class="informacoes-login">
            <h2>LOGIN</h2>
            <h3 class="mensagem">Preencha os campos abaixo.</h3>
            <div class="infos">
                <input type="email" name="email" class="email" placeholder="Preencha seu E-mail">
                <input type="password" name="senha" class="senha" placeholder="Preencha sua senha">
            </div>
            <h3 class="sem-conta">Não possui conta? <a href="./register.php">Cadastrar-se</a></h3>
            <h3 class="sem-conta">Esqueceu a senha?<a href="./redefinir.php"> Alterar</a></h3>
            <input type="submit" id="submit" name="submit" value="Logar" class="entrar">
        </div>
        </form>

    </section>
</body>
</html>