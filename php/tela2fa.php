<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: login.php');
    exit;
}

include_once('config.php');

$email = $_SESSION['email'];

$sql = "SELECT nome_mae, data_nasc, cep FROM usuarios WHERE email = '$email'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $questions = [
        "Qual o nome da sua mãe?" => $user['nome_mae'],
        "Qual a data do seu nascimento?" => $user['data_nasc'],
        "Qual o CEP do seu endereço?" => $user['cep']
    ];

    // Seleciona uma pergunta aleatória se não estiver definida
    if (!isset($_SESSION['random_question']) || !isset($_SESSION['correct_answer'])) {
        $random_key = array_rand($questions);
        $_SESSION['random_question'] = $random_key;
        $_SESSION['correct_answer'] = $questions[$random_key];
    }
} else {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer = trim($_POST['answer']);
    $correct_answer = trim($_SESSION['correct_answer']);

    // Debugging output
    error_log("Correct answer: " . $correct_answer);
    error_log("User provided answer: " . $answer);

    // Convertendo para minúsculas para comparação case-insensitive
    if (strtolower($answer) == strtolower($correct_answer)) {
        // Limpa as variáveis de sessão
        unset($_SESSION['random_question']);
        unset($_SESSION['correct_answer']);
        header('Location: index.php');
        exit;
    } else {
        echo '<script>alert("Resposta incorreta. Tente novamente.");</script>';
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

    <title>Login</title>
</head>
<body>
    <section class="login">

        <div class="imagem-login">
        <img src="assets/logobanzai.png">
        </div>

        <form action="tela2fa.php" method="POST">
        <div class="informacoes-login">
            <h2>Verificação de dois fatores</h2>
            <h3 class="mensagem">Preencha os campos abaixo.</h3>
            <div class="infos">
            <input type="hidden" name="question" value="<?php echo $_SESSION['random_question']; ?>">
            <input type="text" name="answer" class="email" placeholder="<?php echo $_SESSION['random_question']; ?>" required>
            </div>
            <h3 class="sem-conta">Esqueceu a senha?<a href="./redefinir.php"> Alterar</a></h3>
            <input type="submit" id="submit" name="submit" value="Verificar" class="entrar">
        </div>
        </form>

    </section>
</body>
</html>