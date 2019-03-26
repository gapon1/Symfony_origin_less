<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-25
 * Time: 17:20
 */

namespace AppBundle\Entity;


use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $email;


    /**
     * @ORM\Column(type="string")
     *
     */
    private $password;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    public function getRoles()
    {
        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles)){
           $roles[] = 'ROLE_USER';
        }

        return $roles;
    }

    private $plainPassword;

    public function getUsername()
    {
        return  $this->email;
    }



    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        $this->password = null;
    }



    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }



    public function eraseCredentials()
    {

        $this->plainPassword = null;
    }



    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }



}