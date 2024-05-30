<?php 

class database { 

    protected $MYSQL_HOST = 'localhost';
    protected $MYSQL_USER = 'root';
    protected $MYSQL_PASS = '';
    protected $MYSQL_DB = 'ogrenciobs';
    protected $pdo = null ;
    protected $stmt = null ;


    protected function connectDb(){
        $SQLSTR="mysql:host=".$this->MYSQL_HOST.";dbname=".$this->MYSQL_DB.";";
        try {
            $this->pdo = new PDO($SQLSTR,$this->MYSQL_USER,$this->MYSQL_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // verileri obje olarak çek 


        } catch (PDOException $e) {
            die("Veri Tabanı baglantısı Oluşturulamadı".$e->getMessage());
        }
    }

    function __construct()
    {
        $this->ConnectDB();
    }



    function getrow($query,$params){
        //tek satır için 
        try {
            if(is_null($params)){
                $this->stmt = $this->pdo->query($query);
            }else{
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt->fetch();
        } catch (\Throwable $th) {
            print_r($this->stmt->errorInfo());
        }
    }


    function getrows($query,$params){
        //satırlar için  
        try {
            if(is_null($params)){
                $this->stmt = $this->pdo->query($query);
            }else{
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt->fetchAll();
        } catch (\Throwable $th) {
            print_r($this->stmt->errorInfo());
        }
    }


    function getcol($query,$params=null){
        //tek sütun için 
        try {
            if(is_null($params)){
                $this->stmt = $this->pdo->query($query);
            }else{
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt->fetchColumn();
        } catch (\Throwable $th) {
            print_r($this->stmt->errorInfo());
        }
    }


    function __destruct()
    {
        $this->pdo = NULL;
    }
    


}


class signup extends database{

    function getinf($params = null){
        try {
            $this->stmt = $this->pdo->prepare("insert into ogrenci (Isim,Soyisim,tcNum,DogumTarihi,Cinsiyet,BolumID,AnneAdi,BabaAdi,Adres) values (?,?,?,?,?,?,?,?,?)");
            $this->stmt->execute($params);
            return $this->stmt;
        } catch (PDOException $e) {
            error_log("kayıt olusturulamadı".$e->getMessage());
			print_r($this->stmt->errorInfo());
        }
    }
}



