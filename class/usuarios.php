<?php
    Class Usuario 
    {
        private $pdo;
        public $msgErro = "";
        public function conectar($nome, $host, $usuario, $senha)
        {
            global $pdo;
            try {
                $pdo = new PDO("mysqli:dbname=" . $nome . "; host=" . $host, $usuario, $senha);
            }
            catch (PDOException $e){
                $msgErro = $e->getMessage();
            }
        }
        public function cadastrar($nome, $email, $senha){

            global $pdo;
            //check if there is already an email registered
            //If you are not registered, register
            $sql = $pdo->prepare("SELECT id FROM user WHERE email=  :e");
            $sql->bindValue(":e", $email);
            $sql->execute();
            if ($sql->rowCount() > 0)
            {
                return false; //user already registered
            }
            else{
                //if dont find the id, register a new user
            $sql = $pdo->prepare("INSER INTO user (nome, email, senha) VALUES(:n, :e. :s)");

            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", $senha);
            $sql->execute();
            return true;
            }
        }

        public function logar($email, $senha){
            global $pdo;
            //check if email is registred, if yes to enter in new session
            $sql = $pdo->prepare("SELECT id FROM user WHERE email = :e AND senha = :s");
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();

            if ($sql->rowCount()>0){
                     //go to session
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id'] = $dado['id'];
                return true; //login sucefull
            }
            else{
                return false; 
            }

            }

    }
    
?>