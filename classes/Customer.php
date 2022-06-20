<?php

namespace Classes;

use PDO;
use PDOException;

class Customer
{
    private $pdo = null;

    public $id;
    public $name;
    public $email;
    public $address;
    public $phone;
    public $created_at;

    /**
     * 
     */
    public function __construct()
    {
            $host = Config::get('db.host');
            $user = Config::get('db.user');
            $pass = Config::get('db.password');
            $dbname = Config::get('db.dbname');
            $dsn = "mysql:host={$host};dbname={$dbname}";
        try{
            $this->pdo = new PDO($dsn,$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch( PDOException $ex){
            die('Error: '.$ex->getMessage());
        }
    }


    /**
     * 
     */
    public function add()
    {
        $sql = "INSERT INTO customers(`name`,`address`,`email`,`phone`) VALUES(:nm,:adr,:email,:phone)";

        $smtp = $this->pdo->prepare($sql);
        $smtp->bindValue(':nm',$this->name);
        $smtp->bindValue(':adr',$this->address);
        $smtp->bindValue(':email',$this->email);
        $smtp->bindValue(':phone',$this->phone);

        if($smtp->execute()){
            return true;
        }

        return false;
    }

    /**
     * 
     */
    public function all()
    {
        $sql = "SELECT * FROM customers ORDER BY id desc";

        $smtp = $this->pdo->prepare($sql);

        $smtp->execute();

        return $smtp->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 
     */
    public function update()
    {
        $sql = "UPDATE customers  SET `name`=:nm ,`address`=:adr,`email`=:email,`phone`=:phone WHERE id=:id";

        $smtp = $this->pdo->prepare($sql);
        $smtp->bindValue(':id',$this->id);
        $smtp->bindValue(':nm',$this->name);
        $smtp->bindValue(':adr',$this->address);
        $smtp->bindValue(':email',$this->email);
        $smtp->bindValue(':phone',$this->phone);
        
        if($smtp->execute()){
            return true;
        }

        return false;
    }

    /**
     * 
     */
    public function delete()
    {
        $sql = "DELETE FROM customers WHERE id=:id";

        $smtp = $this->pdo->prepare($sql);
        $smtp->bindValue(':id',$this->id);
        
        if($smtp->execute()){
            return true;
        }

        return false;
    }


}

?>