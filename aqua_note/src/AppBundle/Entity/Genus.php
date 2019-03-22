<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-21
 * Time: 19:54
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class Genus
 * @package AppBundle\Entity
 *
 * @ORM\Entity
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
     * @ORM\Column(type="string")
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
        return $this->funFact;
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

}