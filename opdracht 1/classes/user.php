<?php
require_once('DBconfig.php');
class User extends DbConfig{
    
    private $username;
    private $password;
    private $voornaam;
    private $tv;
    private $achternaam;
    private $adres;
    private $postcode;
    private $telefoon;


    public function login($data){
        try {
            $this->username = $data['username'];
            $providedPassword = $data['password'];
            $sql = 'SELECT id, username, password FROM user WHERE username = :user';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user', $this->username);
            if (!$stmt->execute()) {
                throw new Exception('Server error');
            }

            $rowcount = $stmt->rowCount();
            if($rowcount != 1){
                return false;
            }else{
                $result = $stmt->fetch();
                $hashedPassword = $result->password;
                if (password_verify($providedPassword, $hashedPassword)) {
                    return true;
                } else {
                    return false;
                }
            }
           
           
           
    
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function addUser($data){
        try{
            $this->username = $data['username'];
            $this->password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost'=>12]);
            $this->voornaam = $data['voornaam'];
            $this->tv = $data['tv'];
            $this->achternaam = $data['achternaam'];
            $this->adres = $data['adres'];
            $this->postcode = $data['postcode'];
            $this->telefoon = $data['telefoon'];
            $sql = 'INSERT INTO user VALUES(NULL, :username, :password, :voornaam, :tv, :achternaam, :adres, :postcode, :telefoon)';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':voornaam', $this->voornaam);
            $stmt->bindParam(':tv', $this->tv);
            $stmt->bindParam(':achternaam', $this->achternaam);
            $stmt->bindParam(':adres', $this->adres);
            $stmt->bindParam(':postcode', $this->postcode);
            $stmt->bindParam(':telefoon', $this->telefoon);
            if(!$stmt->execute()){
                throw new Exception('er ging iets mis met toeveogen van user');
            }
            return "user added";
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateUser($data, $id){
        try{
            $this->voornaam = $data['voornaam'];
            $this->tv = $data['tv'];
            $this->achternaam = $data['achternaam'];
            $this->adres = $data['adres'];
            $this->postcode = $data['postcode'];
            $this->telefoon = $data['telefoon'];
            $sql = 'UPDATE user SET voornaam = :voornaam, tv = :tv, achternaam = :achternaam, adres = :adres, postcode = :postcode, telefoon = :telefoon where id = :id';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':voornaam', $this->voornaam);
            $stmt->bindParam(':tv', $this->tv);
            $stmt->bindParam(':achternaam', $this->achternaam);
            $stmt->bindParam(':adres', $this->adres);
            $stmt->bindParam(':postcode', $this->postcode);
            $stmt->bindParam(':telefoon', $this->telefoon);
            $stmt->bindParam(':id', $id);

            if(!$stmt->execute()){
                throw new Exception('server error');
            }
            return "changed";
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteUser($id){

        try{
            $sql = 'DELETE FROM user where id = :id';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            if(!$stmt->execute()){
                throw new Exception('er ging iets mis met deleten van account');
            }         
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function showUsers(){
        try{

            $sql = 'SELECT * FROM user';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
      
            if(!$stmt->execute()){
                throw new Exception('er ging iets mis met ophalen van account');
            }
            
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function Userinfo($id){

        try{

            $sql = 'SELECT * FROM user where id = :id';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            if(!$stmt->execute()){
                throw new Exception('er ging iets mis met ophalen van account');
            }
            
            $result = $stmt->fetch();
            return $result;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>