<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Boutique
 *
 * @ORM\Table(name="boutique")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\BoutiqueRepository")
 */
class Boutique
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
     * @ORM\Column(name="nomBoutique", type="string", length=255)
     */
    private $nomBoutique;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureo", type="datetime")
     */
    private $heureo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heuref", type="datetime")
     */
    private $heuref;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Ajouter une image jpg")
     * @Assert\File(mimeTypes={ "image/jpeg","image/jpeg","image/jpg","image/gif" })
     */
    private $image;


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
     * Set nomBoutique
     *
     * @param string $nomBoutique
     *
     * @return Boutique
     */
    public function setNomBoutique($nomBoutique)
    {
        $this->nomBoutique = $nomBoutique;

        return $this;
    }

    /**
     * Get nomBoutique
     *
     * @return string
     */
    public function getNomBoutique()
    {
        return $this->nomBoutique;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Boutique
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Boutique
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set heureo
     *
     * @param \DateTime $heureo
     *
     * @return Boutique
     */
    public function setHeureo($heureo)
    {
        $this->heureo = $heureo;

        return $this;
    }

    /**
     * Get heureo
     *
     * @return \DateTime
     */
    public function getHeureo()
    {
        return $this->heureo;
    }

    /**
     * Set heuref
     *
     * @param \DateTime $heuref
     *
     * @return Boutique
     */
    public function setHeuref($heuref)
    {
        $this->heuref = $heuref;

        return $this;
    }

    /**
     * Get heuref
     *
     * @return \DateTime
     */
    public function getHeuref()
    {
        return $this->heuref;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Boutique
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Boutique
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}

