<?php

require_once 'database.php';

class GestorDeUsuarios {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function registrarNovoUsuario($nome, $email, $senha, $transtornosSelecionados) {
        $this->db->conectar();

        try {
            $this->verificarEmailExistente($email);

            $novoUsuarioId = $this->inserirNovoUsuario($nome, $email, $senha);

            $this->inserirTranstornosUsuario($novoUsuarioId, $transtornosSelecionados);

            // Retornar um JSON para indicar sucesso e redirecionamento
            return json_encode([
                'success' => true,
                'message' => "Cadastro bem-sucedido! Você pode fazer login agora.",
                'redirect' => 'login.html'
            ]);
        } catch (Exception $e) {
            // Retornar um JSON para indicar erro
            return json_encode([
                'success' => false,
                'message' => "Erro no cadastro. " . $e->getMessage(),
            ]);
        } finally {
            $this->db->desconectar();
        }
    }

    private function verificarEmailExistente($email) {
        $checkEmailSql = "SELECT ID FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepararStatement($checkEmailSql);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            throw new Exception("Este email já está em uso. Escolha outro.");
        }
    }

    private function inserirNovoUsuario($nome, $email, $senha) {
        $insertUserSql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->db->prepararStatement($insertUserSql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(3, $hashedSenha);
    
        if ($stmt->execute()) {
            // Use diretamente o PDO para obter o último ID inserido
            return $this->db->conexao->lastInsertId();
        } else {
            throw new Exception("Falha ao inserir novo usuário. Detalhes do erro: " . implode(", ", $stmt->errorInfo()));
        }
    }
      
        
    private function inserirTranstornosUsuario($usuarioId, $transtornosSelecionados) {
        $insertTranstornoSql = "INSERT INTO sofre (ID, ID_transtorno) VALUES (?, ?)";
        $stmt = $this->db->prepararStatement($insertTranstornoSql);

        foreach ($transtornosSelecionados as $transtorno) {
            $transtornoId = $this->obterIdTranstorno($transtorno);

            $stmt->bindParam(1, $usuarioId);
            $stmt->bindParam(2, $transtornoId);
            $stmt->execute();
        }
    }
    
    private function obterIdTranstorno($nomeTranstorno) {
        $selectTranstornoSql = "SELECT ID_transtorno FROM transtornos WHERE nome_transtorno = ?";
        $stmt = $this->db->prepararStatement($selectTranstornoSql);
        $stmt->bindParam(1, $nomeTranstorno);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['ID_transtorno'];
        } else {
            throw new Exception("Transtorno não encontrado: $nomeTranstorno");
        }
    }
}

// Uso do cadastro
$database = new Database();
$gestorDeUsuarios = new GestorDeUsuarios($database);

try {
    $mensagem = $gestorDeUsuarios->registrarNovoUsuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['transtornos']);
    
    // Decodificar o JSON retornado
    $result = json_decode($mensagem, true);

    echo "<script>alert('{$result['message']}'); ";
    
    if ($result['success']) {
        echo "window.location.href = '{$result['redirect']}';";
    } else {
        echo "window.location.href = 'cadastro.html';";
    }
    
    echo "</script>";
} catch (Exception $e) {
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href = 'index.html';</script>";
}
?>