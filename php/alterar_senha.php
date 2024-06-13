<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $email = $_POST['email'];
    $nova_senha = $_POST['senha'];
    
    // Validar dados (você pode adicionar mais validações conforme necessário)
    if (empty($email) || empty($nova_senha)) {
        die("Todos os campos são obrigatórios.");
    }
    
    // Conectar ao banco de dados
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "formulario-teste";
    
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    // Escapar strings para evitar SQL Injection
    $email = $conn->real_escape_string($email);
    $nova_senha = $conn->real_escape_string($nova_senha);
    
    // Atualizar senha no banco de dados
    $sql = "UPDATE usuarios SET senha = '$nova_senha' WHERE email = '$email'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Senha alterada com sucesso.";
    } else {
        echo "Erro ao alterar a senha: " . $conn->error;
    }
    
    // Fechar conexão
    $conn->close();
}
?>