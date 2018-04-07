<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ReviewRepository")
 */
class Review
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
     * @ORM\Column(name="commentaire", type="string", length=2500)
     */
    private $commentaire;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float")
     */
    private $note;
    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id")
     */
    private $iduser;
    /**
     * @var \ProjetBundle\Entity\Produit
     *
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Produit")
     * @ORM\JoinColumn(name="idprdt",referencedColumnName="id")
     */
    private $idprdt;


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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Review
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set note
     *
     * @param float $note
     *
     * @return Review
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return \UserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \UserBundle\Entity\User $iduser
     */
    public function setIduser(\UserBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return Produit
     */
    public function getIdprdt()
    {
        return $this->idprdt;
    }

    /**
     * @param Produit $idprdt
     */
    public function setIdprdt(\ProjetBundle\Entity\Produit $idprdt = null)
    {
        $this->idprdt = $idprdt;
    }


}

