<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionGeneral
 *
 * @ORM\Table(name="description_general")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DescriptionGeneralRepository")
 */
class DescriptionGeneral
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
     * @ORM\Column(name="nomApp", type="string", length=255)
     */
    private $nomApp;

    /**
     * @ORM\Column(name="descriptionApp", type="string", length=255)
     */
    private $descriptionApp;


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
     * Set nomApp
     *
     * @param string $nomApp
     *
     * @return DescriptionGeneral
     */
    public function setNomApp($nomApp)
    {
        $this->nomApp = $nomApp;

        return $this;
    }

    /**
     * Get nomApp
     *
     * @return string
     */
    public function getNomApp()
    {
        return $this->nomApp;
    }

    /**
     * Set descriptionApp
     *
     * @param string $descriptionApp
     *
     * @return DescriptionGeneral
     */
    public function setDescriptionApp($descriptionApp)
    {
        $this->descriptionApp = $descriptionApp;

        return $this;
    }

    /**
     * Get descriptionApp
     *
     * @return string
     */
    public function getDescriptionApp()
    {
        return $this->descriptionApp;
    }
}
