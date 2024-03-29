<?php
class Login extends Conexao
{

    private $login;
    private $senha;

    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function getSenha()
    {
        return $this->senha;
    }



    public function logar()
    {
        $pdo = parent::getDB();

        /*faço meu select com o banco de dados já criado*/
        $logar = $pdo->prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?");
        $logar->bindValue(1, $this->getLogin());
        $logar->bindValue(2, $this->getSenha());
        $logar->execute();
        if ($logar->rowCount() == 1) :
            $dados = $logar->fetch(PDO::FETCH_OBJ);

            /*neste ponto informo a tabela que contem o dados do usurário*/
            $_SESSION['identidade'] = $dados->identidade;
            $_SESSION['email'] = $dados->email;
            $_SESSION['nome'] = $dados->nome;
            $_SESSION['login'] = $dados->login;
            $_SESSION['tipo'] = $dados->tipo;
            $_SESSION['senha'] = $dados->senha;
            $_SESSION['id'] = $dados->id;
            $_SESSION['img'] = $dados->img;
            $_SESSION['coluna'] = $dados->coluna;
            $_SESSION['nome_empresa'] = $dados->nome_empresa;
            $_SESSION['cpf'] = $dados->cpf;
            $_SESSION['cnpj'] = $dados->cnpj;
            $_SESSION['data_nasc'] = $dados->data_nasc;
            

            /*Aqui informo se o mesmo se encontra logado*/
            $_SESSION['logado'] = true;
            return true;
        else :
            return false;
        endif;
    }
}
