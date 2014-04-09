<?php
use Doctrine\Common\Collections\ArrayCollection;
// src/Rapport.php
/**
 * @Entity @Table(name="Rapport")
 **/
class Rapport
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;
    /**
     * @Column(type="string",nullable=true)
     **/
    protected $resume;

    /**
     * @Column(type="datetime")
     **/
    protected $created;


    /**
     * @OneToOne(targetEntity="Bug", mappedBy="rapport")
     */
    protected $bug;

    public function __construct()
    {
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $bug
     */
    public function setBug($bug)
    {
        $this->bug = $bug;
    }

    /**
     * @return mixed
     */
    public function getBug()
    {
        return $this->bug;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }









}
