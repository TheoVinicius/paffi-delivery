<?php
class Usuario
{
    private $pdo;
    public $error = "";

    public function bdconnect($nome, $host, $usuario, $senha)
    {

        global $pdo;
        global $error;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }

    public function cadastro($nome, $senha, $matricula, $email)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO usuario (nome, senha, matricula, email)
            VALUES (:n, :s, :m, :e)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":s", md5($senha));
            $sql->bindValue(":m", $matricula);
            $sql->bindValue(":e", $email);
            $sql->execute();
            return true;
        }
    }

    public function logar($matricula, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario, nome FROM usuario WHERE matricula=:m AND senha=:s");
        $sql->bindValue(":m", $matricula);
        $sql->bindValue(":s", $senha = md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $data['id_usuario'];
            $_SESSION['nome'] = $data['nome'];
            return true;
        } else {
            return false;
         }
    }
}
class vendedor
{
    private $pdo;
    public $error = "";

    public function bdconnect($nome, $host, $usuario, $senha)
    {

        global $pdo;
        global $error;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }

    public function cadastro($nome, $senha, $matricula)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE matricula = :m");
        $sql->bindValue(":m",$matricula);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, senha, matricula)
            VALUES (:n, :s, :m)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":s", md5($senha));
            $sql->bindValue(":m", $matricula);
            $sql->execute();
            return true;
        }
    }

    public function logar($matricula, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario, nome FROM usuarios WHERE matricula=:m AND senha=:s");
        $sql->bindValue(":m", $matricula);
        $sql->bindValue(":s", $senha = md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $data['id_usuario'];
            $_SESSION['nome'] = $data['nome'];
            return true;
        } else {
            return false;
         }
    }
}