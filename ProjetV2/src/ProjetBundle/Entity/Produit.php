<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="nouveausolde", type="float")
     */
    private $nouveausolde;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/jpeg","image/jpg","image/png","image/GIF" })
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="date")
     */
    private $dateajout;

    /**
     * @var string
     *
     * @ORM\Column(name="etatprod", type="string", length=255)
     */
    private $etatprod;

    /**
     * @var \ProjetBundle\Entity\Categorie
     *
     *
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Categorie")
     * @ORM\JoinColumn(name="idcategorie", referencedColumnName="id")
     */
    private $idcategorie;
    /**
     * @var \ProjetBundle\Entity\Boutique
     *
     *
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Boutique")
     * @ORM\JoinColumn(name="idboutique", referencedColumnName="id")
     */
    private $idboutique;

    /**
     * @var @ORM\Column(type="float",nullable=true)
     */
    private $moyenne=0;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
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
     * Set nouveausolde
     *
     * @param float $nouveausolde
     *
     * @return Produit
     */
    public function setNouveausolde($nouveausolde)
    {
        $this->nouveausolde = $nouveausolde;

        return $this;
    }

    /**
     * Get nouveausolde
     *
     * @return float
     */
    public function getNouveausolde()
    {
        return $this->nouveausolde;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Produit
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

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     *
     * @return Produit
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    /**
     * Get dateajout
     *
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * Set etatprod
     *
     * @param string $etatprod
     *
     * @return Produit
     */
    public function setEtatprod($etatprod)
    {
        $this->etatprod = $etatprod;

        return $this;
    }

    /**
     * Get etatprod
     *
     * @return string
     */
    public function getEtatprod()
    {
        return $this->etatprod;
    }

    /**
     * @return Categorie
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * @param Categorie $idcategorie
     */
    public function setIdcategorie($idcategorie)
    {
        $this->idcategorie = $idcategorie;
    }

    /**
     * @return Boutique
     */
    public function getIdboutique()
    {
        return $this->idboutique;
    }

    /**
     * @param Boutique $idboutique
     */
    public function setIdboutique($idboutique)
    {
        $this->idboutique = $idboutique;
    }

    /**
     * @return mixed
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * @param mixed $moyenne
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;
    }



}

