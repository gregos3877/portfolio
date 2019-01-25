<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LienSociaux
 *
 * @ORM\Table(name="lien_sociaux")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LienSociauxRepository")
 */
class LienSociaux
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lienTwitter", type="string", length=255, nullable=true, unique=true)
     */
    private $lienTwitter;

    /**
     * @var string
     *
     * @ORM\Column(name="lienFacebook", type="string", length=255, nullable=true, unique=true)
     */
    private $lienFacebook;

    /**
     * @var string
     *
     * @ORM\Column(name="lienGithub", type="string", length=255, nullable=true, unique=true)
     */
    private $lienGithub;


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
     * Set lienTwitter
     *
     * @param string $lienTwitter
     *
     * @return LienSociaux
     */
    public function setLienTwitter($lienTwitter)
    {
        $this->lienTwitter = $lienTwitter;

        return $this;
    }

    /**
     * Get lienTwitter
     *
     * @return string
     */
    public function getLienTwitter()
    {
        return $this->lienTwitter;
    }

    /**
     * Set lienFacebook
     *
     * @param string $lienFacebook
     *
     * @return LienSociaux
     */
    public function setLienFacebook($lienFacebook)
    {
        $this->lienFacebook = $lienFacebook;

        return $this;
    }

    /**
     * Get lienFacebook
     *
     * @return string
     */
    public function getLienFacebook()
    {
        return $this->lienFacebook;
    }

    /**
     * Set lienGithub
     *
     * @param string $lienGithub
     *
     * @return LienSociaux
     */
    public function setLienGithub($lienGithub)
    {
        $this->lienGithub = $lienGithub;

        return $this;
    }

    /**
     * Get lienGithub
     *
     * @return string
     */
    public function getLienGithub()
    {
        return $this->lienGithub;
    }
}

