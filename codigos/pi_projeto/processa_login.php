<?php

session_start();
require_once 'database.php';


class Autenticacao {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function autenticar($email, $senha) {
        $this->db->conectar();

        try {
            $sql = "SELECT ID, nome, senha FROM usuarios WHERE email = ?";
            $stmt = $this->db->prepararStatement($sql);
    
            $stmt->bindParam(1, $email);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result && password_verify($senha, $result['senha'])) {
                // Variável de sessão após um login bem-sucedido
                $_SESSION['usuario_autenticado'] = true;
                $_SESSION['usuario_id'] = $result['ID'];
                $_SESSION['usuario_nome'] = $result['nome'];
    
                // Chama a função para contar os transtornos do usuário
                $numTranstornos = $this->contarTranstornosUsuario($result['ID']); // ---------------
    
                return json_encode([
                    'success' => true,
                    'message' => "Login bem-sucedido! Bem-vindo, " . $result['nome'] . " (ID: " . $result['ID'] . "). Transtornos: " . $numTranstornos, // --------
                    'redirect' => 'pagina_principal.php'
                ]);
            } else {
                throw new Exception("Credenciais inválidas. Tente novamente.");
            }
        } catch (Exception $e) {
            return json_encode([
                'success' => false,
                'message' => "Erro: Falha no login. Por favor, verifique suas credenciais e tente novamente.",
            ]);
        } finally {
            $this->db->desconectar();
        }
    }
    //acrescentado essa function 
    private function contarTranstornosUsuario($userId) {
        try {
            // Use a função do MySQL para contar os transtornos do usuário
            $sql = "SELECT contarTranstornosUsuario(?) as numTranstornos";
            $stmt = $this->db->prepararStatement($sql);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return ($result) ? $result['numTranstornos'] : 0;
        } catch (Exception $e) {
            throw new Exception("Erro ao contar transtornos do usuário: " . $e->getMessage());
        }
    }
}

// Uso da autenticação
$database = new Database();
$autenticacao = new Autenticacao($database);

try {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $result = json_decode($autenticacao->autenticar($email, $senha), true);

    echo "<script>alert('{$result['message']}'); ";
    
    if ($result['success']) {
        echo "window.location.href = '{$result['redirect']}';";
    } else {
        echo "window.location.href = 'login.html';";
    }
    
    echo "</script>";
} catch (Exception $e) {
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href = 'index.html';</script>";
}
?>
