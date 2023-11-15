<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    // Se o usuário não estiver autenticado, redirecione-o para a página de login
    header("Location: login.php");
    exit();
}

// O usuário está autenticado, você pode obter informações do usuário a partir do $_SESSION se necessário
$usuario = $_SESSION["usuario"];

// Agora você pode exibir o perfil do usuário
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Usuário</title>
</head>
<body>
    <h1>Perfil do Usuário</h1>
    <p>Bem-vindo, <?php echo $usuario; ?>!</p>
    <p>Aqui você pode adicionar informações adicionais do perfil do usuário.</p>
    <a href="logout.php">Sair</a>
</body>
</html>
