<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-21
 * Time: 19:54
 */
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\SubFamily;
/**
 * Class Genus
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenusRepository")
 * @ORM\Table(name="genus")
 */
class Genus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = true;
    /**
     * @return ArrayCollection|GenusNote[]
     */
    public function getNotes()
    {
        return $this->notes;
    }
    public function getId()
    {
        return $this->id;
    }
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\GenusNote", mappedBy="genus")
     * @ORM\OrderBy({"createdAt"="DESC"})
     *
     */
    private $notes;
    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function getisPublished()
    {
        return $this->isPublished;
    }
    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }
    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SubFamily")
     * @ORM\JoinColumn(nullable=true)
     */
    private $subFamily;
    /**
     * @ORM\Column(type="integer")
     */
    private $specCount;
    /**
     * @ORM\Column(type="string")
     */
    private $funFact;
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $firstDiscoveredAt;
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return mixed
     */
    public function getSubFamily()
    {
        return $this->subFamily;
    }
    /**
     * @param mixed $subFamily
     */
    public function setSubFamily($subFamily)
    {
        $this->subFamily = $subFamily;
    }
    /**
     * @return mixed
     */
    public function getSpecCount()
    {
        return $this->specCount;
    }
    /**
     * @param mixed $specCount
     */
    public function setSpecCount($specCount)
    {
        $this->specCount = $specCount;
    }
    /**
     * @return mixed
     */
    public function getFunFact()
    {
        return '**TEST** ' .$this->funFact;
    }
    /**
     * @param mixed $funFact
     */
    public function setFunFact($funFact)
    {
        $this->funFact = $funFact;
    }
    public function updated()
    {
        return new \DateTime('-'.rand(0, 100).'days');
    }
    public function getFirstDiscoveredAt()
    {
        return $this->firstDiscoveredAt;
    }
    public function setFirstDiscoveredAt(\DateTime $firstDiscoveredAt = null)
    {
        $this->firstDiscoveredAt = $firstDiscoveredAt;
    }
}