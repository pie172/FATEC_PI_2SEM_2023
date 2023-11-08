<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conexão com o banco de dados
    $conexao = new mysqli("localhost", "user", "password", "registros");

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Verifique se o email já está em uso
    $check_email_sql = "SELECT id FROM usuarios WHERE email = ?";
    $check_email_stmt = $conexao->prepare($check_email_sql);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        echo "Este email já está em uso. Escolha outro.";
    } else {
        // Insira o novo usuário no banco de dados
        $insert_sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
        $insert_stmt = $conexao->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $email, $senha);
        if ($insert_stmt->execute()) {
            echo "Cadastro bem-sucedido! Você pode fazer login agora.";
        } else {
            echo "Erro no cadastro. Tente novamente.";
        }
    }

    $check_email_stmt->close();
    $insert_stmt->close();
    $conexao->close();
}
?>
