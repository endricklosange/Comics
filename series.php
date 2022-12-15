<?php

use Serie as GlobalSerie;

class Serie extends Database
{
    protected $id;
    protected $created;
    protected $updated;
    protected $serie_id;
    protected $title;
    protected $origin;



    public function __construct($d)
    {
        parent::__construct();
        if (is_array($d)) {

            $this->hydrate($d);
        } else if (is_int($d) || (int) $d > 0) {
            $d = (int) $d;
            $r = $this->prepare('SELECT * FROM series WHERE id=:i');
            $r->execute([':i' => $d]);

            if ($r->rowCount() > 0)
                $this->hydrate($r->fetch(PDO::FETCH_ASSOC));
        }
    }

    /**
     * Set the value of origin
 
     */
    public function setOrigin($d)
    {
        $this->origin = (string) $d;

        return $this;
    }

    /**
     * Set the value of title
 
     */
    public function setTitle($d)
    {
        $this->title = (string) $d;

        return $this;
    }

    /**
     * Set the value of serie_id

     */
    public function setSerie_id($d)
    {
        $this->serie_id = (string) $d;

        return $this;
    }

    /**
     * Set the value of updated

     */
    public function setUpdated($d)
    {
        $this->updated = (string) $d;

        return $this;
    }

    /**
     * Set the value of created
 
     */
    public function setCreated($d)
    {
        $this->created = (string) $d;

        return $this;
    }

    /**
     * Set the value of id
 
     */
    public function setId($d)
    {
        $this->id = (string) $d;

        return $this;
    }

    /**
     * Get the value of origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of serie_id
     */
    public function getSerie_id()
    {
        return $this->serie_id;
    }

    /**
     * Get the value of updated
     */
    public function getUpdated()
    {
        $d = new DateTime($this->updated);
        return $d->format('d/m/Y h:i:s');
    }

    /**
     * Get the value of created
     */
    public function getCreated()
    {
        $d = new DateTime($this->created);
        return $d->format('d/m/Y h:i:s');
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    // -------------------------------- fonctions 

    public function Save()
    {

        if (empty($this->id)) {
            $n = $this->prepare('INSERT INTO series (title , origin) VALUES (:title, :origin)');
            $n->execute([':title' => $this->title, ':origin' => $this->origin]);
        } else {
            $n = $this->prepare('UPDATE series SET title = :title, origin = :origin WHERE id=:i');
            $n->execute([':title' => $this->title, ':origin' => $this->origin, ':i' => $this->id]);
        }
    }

    public function isValid()
    {
        if (
            empty($this->title)
            || $this->name == '-'
            || strlen($this->title) > 50
            || strlen($this->origin) > 50
        )
            return false;

        return true;
    }
    public function delete()
    {
        $n = $this->prepare('DELETE FROM series WHERE id = :i');
        $n->execute([':i' => $this->id]);
    }

    public static function all()
    {
        //instance de base de données
        $sql = new Database();
        // on recup toutes les lignes
        $tAll = [];
        $r = $sql->prepare('SELECT * FROM `series`');
        $r->execute();
        while ($one = $r->fetch(PDO::FETCH_ASSOC)) {
            array_push($tAll, new Serie($one));
        }
        return $tAll;
    }
    public static function randSerie()
    {
        $allSeries = Serie::all();
        $random = $allSeries[rand(0, count($allSeries)-1)];
        return $random;
    }
    public function detail()
    {
        $n = $this->prepare('SELECT * FROM `series`WHERE id = :i');
        $n->execute([':i' => $this->id]);
        $tAll = [];
        while ($one = $n->fetch(PDO::FETCH_ASSOC)) {
            array_push($tAll, new Serie($one));
        }
        return $tAll;
    }
    public function search($string){
        $n = $this->prepare("SELECT * FROM `series`WHERE title LIKE '%".$string."%' OR origin LIKE '%".$string."%'");
        $n->execute();
        $tAll = [];
        while ($one = $n->fetch(PDO::FETCH_ASSOC)) {
            array_push($tAll, new Serie($one));
        }
        return $tAll;
    }
}
