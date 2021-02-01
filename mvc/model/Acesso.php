<?php
    include_once '../../Conexao.php';
    class Acesso{
        private $id;
        private $codFicha;
        private $nome;
        private $km;
        private $sentido;
        private $status;

        function __construct($id = null, $codFicha = null, $nome = null, $km = null, $sentido = null, $status = null){
            if($id){
                $this->id = $id;
            }
            $this->codFicha = $codFicha;
            $this->nome = $nome;
            $this->km = $km;
            $this->sentido = $sentido;
            if ($status){
                $this->status = $status;
            }else{
                $this->status = 0;//não editado
            }

        }

        public function __set($name, $value){
            $this->$name = $value;
        }

       public function __get($name){
           return $this->$name;
       }

       public function __isset($name){
           return isset($this->$name);
       }

        public function insert(){
            $sql = "INSERT INTO acesso(codFicha, nome, km, sentido, status) VALUES (:codFicha, :nome, :km, :sentido, :status)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('codFicha',  $this->codFicha);
            $consulta->bindValue('nome', $this->nome);
            $consulta->bindValue('km', $this->km);
            $consulta->bindValue('sentido', $this->sentido);
            $consulta->bindValue('status', $this->status);
            return $consulta->execute();
        }

        public function update(){
            $sql = "UPDATE acesso SET codFicha = :codFicha, nome = :nome, km = :km, sentido = :sentido, status = :status WHERE id = :id ";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',  $this->id);
            $consulta->bindValue('codFicha',  $this->codFicha);
            $consulta->bindValue('nome', $this->nome);
            $consulta->bindValue('km', $this->km);
            $consulta->bindValue('sentido', $this->sentido);
            $consulta->bindValue('status', $this->status);
            return $consulta->execute();
        }    

        public function updateParam($id = null, $coluna = null, $status = null){
            $sql = "UPDATE acesso SET {$coluna} = :status WHERE id = :id ";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',  $id);
            $consulta->bindValue('status', $status);
            return $consulta->execute();
        }

        public function delete($id = null){
            $sql =  "DELETE FROM acesso WHERE id = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            return $consulta->execute();
        }
    
        public function find($id = null){
            $sql =  "SELECT * FROM acesso WHERE id = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            $consulta->execute();
            return $consulta->fetch();
        }
    
        public function findAll(){
            $sql = "SELECT * FROM acesso";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findByFilter($tabela, $coluna, $valor){
            $sql = "SELECT * FROM {$tabela} WHERE {$coluna}={$valor}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findInterval($tabela, $coluna, $valor1, $valor2){
            $sql = "SELECT * FROM {$tabela} WHERE {$coluna}>={$valor1} AND {$coluna}<={$valor2}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function getTable($tabela){
            $sql = "SELECT * FROM {$tabela}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function count(){
            $sql = "SELECT COUNT(*) AS linhas FROM acesso";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetch();
        }

        public function countParam($tabela = null, $coluna = null, $valor = null){
            $sql = "SELECT COUNT(*) AS num FROM {$tabela} WHERE {$coluna}={$valor}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetch();
        }

        public function salvarFoto($id, $nome, $data, $observacao = null){
            $sql = "INSERT INTO fotos_acesso(codFicha, nome, data, observacao) VALUES (:codFicha, :nome, :data, :observacao)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('codFicha',$id);
            $consulta->bindValue('nome',$nome);
            $consulta->bindValue('data',$data);
            $consulta->bindValue('observacao',$observacao);
            return $consulta->execute();
        }

    }
?>