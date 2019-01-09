<?php
/**
 * Created by PhpStorm.
 * User: 302768737
 * Date: 9-1-2019
 * Time: 10:07
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getSalaris()
    {
        return $this->salaris;
    }

    /**
     * @return mixed
     */
    public function getAfdeling()
    {
        return $this->afdeling;
    }

    /**
     * @param mixed $afdeling
     */
    public function setAfdeling($afdeling)
    {
        $this->afdeling = $afdeling;
    }

    /**
     * @param mixed $salaris
     */
    public function setSalaris($salaris)
    {
        $this->salaris = $salaris;
    }

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $naam;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $salaris;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = array();

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Afdeling", inversedBy="users")
     * @ORM\JoinColumn(name="afdeling_id", referencedColumnName="id")
     */
    private $afdeling;

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }



    public function getSalt()
    {

    }

    /**
     * @return mixed
     */
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
    public function getRoles()
    {
        return $this->roles;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function eraseCredentials()
    {

    }
}