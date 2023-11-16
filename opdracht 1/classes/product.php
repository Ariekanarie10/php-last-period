<?php
require_once('DBconfig.php');
class Product extends DbConfig{
    
    private $naam;
    private $text;
    private $prijs;
    private $aantal;

    public function addProduct($data){
        try{
            $this->naam = $data['naam'];
            $this->text = $data['text'];
            $this->prijs = $data['prijs'];
            $this->aantal = $data['aantal'];

            $sql = 'INSERT INTO product VALUES(NULL, :naam, :text, :prijs, :aantal)';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':naam', $this->naam);
            $stmt->bindParam(':text', $this->text);
            $stmt->bindParam(':prijs', $this->prijs);
            $stmt->bindParam(':aantal', $this->aantal);
 
            if(!$stmt->execute()){
                throw new Exception('er ging iets mis met toeveogen van user');
            }
            return "user added";
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateProduct($data, $id){
        try{
            $this->naam = $data['naam'];
            $this->text = $data['text'];
            $this->prijs = $data['prijs'];
            $this->aantal = $data['aantal'];

            $sql = 'UPDATE product SET naam = :naam, beschrijving = :text, prijs = :prijs, aantal = :aantal where id = :id';
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':naam', $this->naam);
            $stmt->bindParam(':text', $this->text);
            $stmt->bindParam(':prijs', $this->prijs);
            $stmt->bindParam(':aantal', $this->aantal);

            $stmt->bindParam(':id', $id);

            if(!$stmt->execute()){
                throw new Exception('server error');
            }
            return "changed";
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteProduct($id){

        try{
            $sql = 'DELETE FROM product where id = :id';
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

    public function showProduct(){
        try{

            $sql = 'SELECT * FROM product';
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

    public function productInfo($id){

        try{

            $sql = 'SELECT * FROM product where id = :id';
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