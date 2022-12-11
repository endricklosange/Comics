<?php

use Books as GlobalBooks;

class Books extends Database
{
    protected $id;
    protected $created;
    protected $updated;
    protected $serie_id;
    protected $title;
    protected $num;
    protected $writer;
    protected $illustrator;
    protected $editor;
    protected $releaseyear;
    protected $strips;
    protected $cover;
    protected $rep;

    public function __construct($d)
    {
        parent::__construct();
        if (is_array($d)) {

            $this->hydrate($d);
        } else if (is_int($d) || (int) $d > 0) {
            $d = (int) $d;
            $r = $this->prepare('SELECT * FROM books WHERE id=:i');
            $r->execute([':i' => $d]);

            if ($r->rowCount() > 0)
                $this->hydrate($r->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function getCreated()
    {
        $d = new DateTime($this->created);
        return $d->format('d/m/Y h:i:s');
    }
    public function getUpdated()
    {
        $d = new DateTime($this->updated);
        return $d->format('d/m/Y h:i:s');
    }
    public function setCreated($d)
    {
        $this->created = (string) $d;
    }

    public function setUpdated($d)
    {
        $this->updated = (string) $d;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of editor
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @return  self
     */
    public function setEditor($editor)
    {
        $this->editor = (string)$editor;

        return $this;
    }

    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set the value of num
     *
     * @return  self
     */
    public function setNum($num)
    {
        $this->num = (string)$num;

        return $this;
    }

    /**
     * Get the value of cover
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set the value of cover
     *
     * @return  self
     */
    public function setCover($cover)
    {
        $this->cover = (string)$cover;

        return $this;
    }

    /**
     * Get the value of rep
     */
    public function getRep()
    {
        return $this->rep;
    }

    /**
     * Set the value of rep
     *
     * @return  self
     */
    public function setRep($rep)
    {
        $this->rep = $rep;

        return $this;
    }

    /**
     * Get the value of writer
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * Set the value of writer
     *
     * @return  self
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;

        return $this;
    }

    /**
     * Get the value of illustrator
     */
    public function getIllustrator()
    {
        return $this->illustrator;
    }

    /**
     * Set the value of illustrator
     *
     * @return  self
     */
    public function setIllustrator($illustrator)
    {
        $this->illustrator = $illustrator;

        return $this;
    }

    /**
     * Get the value of strips
     */
    public function getStrips()
    {
        return $this->strips;
    }

    /**
     * Set the value of strips
     *
     * @return  self
     */
    public function setStrips($strips)
    {
        $this->strips = $strips;

        return $this;
    }
    
    /**
     * Get the value of releaseyear
     */ 
    public function getReleaseyear()
    {
        return $this->releaseyear;
    }

    /**
     * Set the value of releaseyear
     *
     * @return  self
     */ 
    public function setReleaseyear($releaseyear)
    {
        $this->releaseyear = $releaseyear;

        return $this;
    }
    
    /**
     * Get the value of serie_id
     */ 
    public function getSerie_id()
    {
        return $this->serie_id;
    }

    /**
     * Set the value of serie_id
     *
     * @return  self
     */ 
    public function setSerie_id($serie_id)
    {
        $this->serie_id = $serie_id;

        return $this;
    }
    // -------------------------------- fonctions 

    public function Save()
    {
        if (empty($this->id)) {
            $n = $this->prepare('INSERT INTO books (writer, serie_id, title, num, illustrator, editor, releaseyear, strips, cover, rep) VALUES (:writer,:serie_id, :title, :num, :illustrator, :editor, :releaseyear, :strips, :cover, :rep)');
            $n->execute([':writer' => $this->writer,':serie_id' => $this->serie_id, ':title' => $this->title ,':num' => $this->num, ':illustrator' => $this->illustrator,':editor' => $this->editor, ':releaseyear' => $this->releaseyear ,':strips' => $this->strips, ':cover' => $this->cover, ':rep' => $this->rep]);
        } else {
            $n = $this->prepare('UPDATE books SET serie_id = :serie_id, title = :title, num = :num, illustrator = :illustrator, editor = :editor, releaseyear = :releaseyear, strips = :strips, cover = :cover, rep = :rep WHERE id=:i');
            $n->execute([':serie_id' => $this->serie_id, ':title' => $this->title ,':num' => $this->num, ':illustrator' => $this->illustrator,':editor' => $this->editor, ':releaseyear' => $this->releaseyear ,':strips' => $this->strips, ':cover' => $this->cover, ':rep' => $this->rep]);
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
        $n = $this->prepare('DELETE FROM books WHERE id = :i');
        $n->execute([':i' => $this->id]);
    }

    public static function all()
    {
        //instance de base de données
        $sql = new Database();
        // on recup toutes les lignes
        $tAll = [];
        $r = $sql->prepare('SELECT * FROM books');
        $r->execute();

        while ($one = $r->fetch(PDO::FETCH_ASSOC)) {
            array_push($tAll, new Books($one));
        }
        return $tAll;
    }
}
