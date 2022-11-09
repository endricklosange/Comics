<?php

class Albums extends Database
{
    protected $id;
    protected $created;
    protected $updated;
    protected $title;
    protected $scriptwriter;
    protected $designer;
    protected $editor;
    protected $boards;
    protected $realese_years;
    protected $num;
    protected $cover;
    protected $rep;
    protected $series_id;

    public function __construct($d)
    {
        parent::__construct();
        if (is_array($d)) {

            $this->hydrate($d);
        } else if (is_int($d) || (int) $d > 0) {
            $d = (int) $d;
            $r = $this->prepare('SELECT * FROM Albums WHERE id=:i');
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
     * Get the value of scriptwriter
     */ 
    public function getScriptWriter()
    {
        return $this->scriptwriter;
    }

    /**
     * Set the value of scriptwriter
     *
     * @return  self
     */ 
    public function setScriptWriter($scriptwriter)
    {
        $this->scriptwriter = (string)$scriptwriter;

        return $this;
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
     * Get the value of designer
     */ 
    public function getDesigner()
    {
        return $this->designer;
    }

    /**
     * Set the value of designer
     *
     * @return  self
     */ 
    public function setDesigner($designer)
    {
        $this->designer = (string)$designer;

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
     * Get the value of boards
     */ 
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * Set the value of boards
     *
     * @return  self
     */ 
    public function setBoards($boards)
    {
        $this->boards = (string)$boards;

        return $this;
    }

    /**
     * Get the value of realese_years
     */ 
    public function getRealese_years()
    {
        return $this->realese_years;
    }

    /**
     * Set the value of realese_years
     *
     * @return  self
     */ 
    public function setRealese_years($realese_years)
    {
        $this->realese_years = $realese_years;

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
        $this->num = (int)$num;

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
     * Get the value of series_id
     */ 
    public function getSeries_id()
    {
        return $this->series_id;
    }

    /**
     * Set the value of series_id
     *
     * @return  self
     */ 
    public function setSeries_id($series_id)
    {
        $this->series_id =(int)$series_id;

        return $this;
    }
}