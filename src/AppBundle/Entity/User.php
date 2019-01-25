<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Adresse", cascade={"persist"})
     */
    private $adresses;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\DescriptionGeneral", cascade={"persist"})
     */
    private $descriptionGeneral;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\LienSociaux", cascade={"persist"})
     */
    private $lienSociaux;


    public function __construct()
    {
        parent::__construct();
        $this->adresses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Add adresse
     *
     * @param \AppBundle\Entity\Adresse $adress
     *
     * @return User
     */
    public function addAdresse(Adresse $adresse)
    {
        $this->adresses[] = $adresse;

        return $this;
    }

    /**
     * Remove adresse
     *
     * @param \AppBundle\Entity\Adresse $adress
     */
    public function removeAdresse(Adresse $adresse)
    {
        $this->adresses->removeElement($adresse);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    public function uniqueAdresse()
    {
        return $this->adresses[0];
    }

    /**
     * Add adress.
     *
     * @param \AppBundle\Entity\Adresse $adress
     *
     * @return User
     */
    public function addAdress(\AppBundle\Entity\Adresse $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress.
     *
     * @param \AppBundle\Entity\Adresse $adress
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAdress(\AppBundle\Entity\Adresse $adress)
    {
        return $this->adresses->removeElement($adress);
    }

    /**
     * Set descriptionGeneral.
     *
     * @param \AppBundle\Entity\DescriptionGeneral|null $descriptionGeneral
     *
     * @return User
     */
    public function setDescriptionGeneral(\AppBundle\Entity\DescriptionGeneral $descriptionGeneral = null)
    {
        $this->descriptionGeneral = $descriptionGeneral;

        return $this;
    }

    /**
     * Get descriptionGeneral.
     *
     * @return \AppBundle\Entity\DescriptionGeneral|null
     */
    public function getDescriptionGeneral()
    {
        return $this->descriptionGeneral;
    }

    /**
     * Set lienSociaux.
     *
     * @param \AppBundle\Entity\LienSociaux|null $lienSociaux
     *
     * @return User
     */
    public function setLienSociaux(\AppBundle\Entity\LienSociaux $lienSociaux = null)
    {
        $this->lienSociaux = $lienSociaux;

        return $this;
    }

    /**
     * Get lienSociaux.
     *
     * @return \AppBundle\Entity\LienSociaux|null
     */
    public function getLienSociaux()
    {
        return $this->lienSociaux;
    }
}
