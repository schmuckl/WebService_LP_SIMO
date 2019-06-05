<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneCommande
 * @ORM\Table(name="lignecommande")
 * @ORM\Entity
 */
class LigneCommande
{   
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="article_id", type="integer", nullable=false)
     * @ORM\GeneratedValue
     */
    private $article_id;

    /**
     * @var int
     *
     * @ORM\Column(name="commande_id", type="integer", nullable=false)
     * @ORM\GeneratedValue
     */
    private $commande_id;

    /**
     * @var integer
     * 
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var string
     * 
     * @ORM\Column(name="prix", type="decimal", scale=2, nullable=false)
     */
    private $prix;

    /**
     * @var App\Entity\Article
     * 
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="lignecommandes")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;

    /**
     * @var App\Entity\Commande
     * 
     * @ORM\ManyToOne(targetEntity="Commande", inversedBy="lignecommandes")
     * @ORM\JoinColumn(name="commande_id", referencedColumnName="id")
     */
    private $commande;


    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return LigneCommande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return LigneCommande
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set article
     *
     * @param App\Entity\Article $article
     *
     * @return LigneCommande
     */
    public function setArticle(App\Entity\Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return App\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set commande
     *
     * @param App\Entity\Commande $commande
     *
     * @return LigneCommande
     */
    public function setCommande(App\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return App\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }
    public function __toString() {
        return $this->getId().toString();
    }
}
