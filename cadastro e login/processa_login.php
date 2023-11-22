<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conecte-se ao banco de dados (substitua pelos dados de conexão reais)
    $conexao = new mysqli("localhost", "seu_usuario", "sua_senha", "Usuarios");

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    $sql = "SELECT * FROM Usuarios WHERE email = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login bem-sucedido, redirecionando para pagina de inicio
        $_SESSION["usuario"] = $email;
        header("Location: perfil.php"); // pagina de inicio
    } else {
        echo "Login falhou. Verifique seu email e senha.";
    }

    $stmt->close();
    $conexao->close();
}
?>
