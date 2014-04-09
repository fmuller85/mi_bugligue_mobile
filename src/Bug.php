<?php
use Doctrine\Common\Collections\ArrayCollection;
// src/Bug.php
/**
 * @Entity @Table(name="bugs")
 **/
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;
    /**
     * @Column(type="string")
     **/
    protected $description;
    /**
     * @Column(type="datetime")
     **/
    protected $created;
    /**
     * @Column(type="string")
     **/
    protected $status;

    /**
     * @Column(type="datetime",nullable=true)
     **/
    protected $datelimite;

    /**
     * @Column(type="string",nullable=true)
     **/
    protected $screen;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs", cascade={"persist"})
     * @ORM\JoinColumn(name="engineer_id", referencedColumnName="id", nullable="true")
     **/
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     **/
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product")
     **/
    protected $products;

    /**
     * @OneToOne(targetEntity="Rapport", inversedBy="bug")
     * @JoinColumn(name="rapport_id", referencedColumnName="id")
     */
    protected $rapport;

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function setEngineer($engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    public function setReporter($reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer()
    {
        return $this->engineer;
    }

    public function getReporter()
    {
        return $this->reporter;
    }

    public function assignToProduct($product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function close()
    {
        $this->status = "CLOSE";
    }
    /**
     * @param mixed $rapports
     */
    public function setRapport($rapports)
    {
        $this->rapport = $rapports;
    }

    /**
     * @return mixed
     */
    public function getRapport()
    {
        return $this->rapport;
    }

    /**
     * @param mixed $screen
     */
    public function setScreen($screen)
    {
        $this->screen = $screen;
    }

    /**
     * @return mixed
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * @param mixed $datelimite
     */
    public function setDatelimite($datelimite)
    {
        $this->datelimite = $datelimite;
    }

    /**
     * @return mixed
     */
    public function getDatelimite()
    {
        return $this->datelimite;
    }



}