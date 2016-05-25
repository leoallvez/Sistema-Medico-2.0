<?php
include_once 'dados.cfg.php';

class DAO {

    protected $con = null;
    protected $host = HOST_BD;
    protected $dbname = NAME_BD;
    protected $user = USER_BD;
    protected $password = PASSWORD_BD;
    

    public function openConnection() {

        try {

            $this->con = new PDO(
                'mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf-8',
                $this->user,
                $this->password
            );
   
            $this->con->exec("SET NAMES utf8");
   
            if(!$this->con) throw new Exception("Não foi possível contectar-se à base de dados.");
            return $this->con;
        } catch(PDOException $e ) {

            //tratar  p/ arquivo de log
            echo $e->getLine() ." ". $e->getMessage(); 
            exit();
            
        }

    }
    
    protected function closeConnection() {
        if($this->con != null) $this->con = null;
    }

    public function __destruct() {
        $this->closeConnection();
    }
}

/**Se você criou suas classes do domínio seguindo o padrão de projeto
 "Mapeando Objetos como Tabelas", para cada objeto do domínio existente, 
 você deverá criar uma classe de implementação do DAO que estenderá a classe 
 acima a fim de se conectar ao banco de dados de sua aplicação.

Outros métodos de consulta, inserção, atualização e exclusão de registros 
do banco de dados devem ser criados diretamente na classe de implementação do 
DAO para o referido objeto do domínio, por exemplo, ClienteDAO. Para facilitar, 
crie uma interface com os métodos mais utilizados, que poderá ficar exatamente assim:*/

interface IDAO {
    public function findByPK($pk);
    public function listAll();
    public function insert($object);
    public function update($object);
    public function delete($pk);
}

/**A interface acima poderá ser implementada pela classe de implementação do 
DAO para um determinado objeto do domínio como a seguir:*/

include_once '../domain/Cliente.class.php';
include_once 'DAO.class.php';
include_once 'IDAO.class.php';

class ClienteDAO extends DAO implements IDAO {

    public function findByPK($pk) {
  //código
 }
 
    public function listAll() {
  //código
 }
 
    public function insert($object) {
  //código
 }
    public function update($object) {
  //código
 }
    public function delete($pk) {
  //código
 }
}
?>