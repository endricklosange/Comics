<?php
class Database extends PDO{
    
    protected $connected = false;
    public function __construct()
    {
        if(!$this->connected){
            try{
                parent::__construct('mysql:host=localhost;charset=utf8;dbname=Comics','endrick','Losange+971');
                $this->connected = true;
            }catch(PDOException $e){
                print 'Erreur : ' . $e->getMessage();
                exit();
            }
        }
    }
    public function hydrate(array $d){
        foreach($d as $key => $value){
            $setter = 'set'. ucfirst($key);
            if(method_exists($this, $setter))
            $this->$setter(trim($value));
        }
    }

}