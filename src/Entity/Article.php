<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="IDX_23A0E66BCF5E72D", columns={"categorie_id"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    private $categorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", inversedBy="article")
     * @ORM\JoinTable(name="lignecommande",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="commande_id", referencedColumnName="id")
     *   }
     * )
     */
    private $commande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commande = new \Doctrine\Common\Collections\ArrayCollection();
    }

      /**
     * Get id
     *
     * @return integer
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
     * @return Article
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
     * @param string $prix
     *
     * @return Article
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
     * Set description
     *
     * @param string $description
     *
     * @return Article
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
     * Set stock
     *
     * @param integer $stock
     *
     * @return Article
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Add lignecommande
     *
     * @param App\Entity\LigneCommande $lignecommande
     *
     * @return Article
     */
    public function addLignecommande(App\Entity\LigneCommande $lignecommande)
    {
        $this->lignecommandes[] = $lignecommande;

        return $this;
    }

    /**
     * Remove lignecommande
     *
     * @param App\Entity\LigneCommande $lignecommande
     */
    public function removeLignecommande(App\Entity\LigneCommande $lignecommande)
    {
        $this->lignecommandes->removeElement($lignecommande);
    }

    /**
     * Get lignecommandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignecommandes()
    {
        return $this->lignecommandes;
    }

    /**
     * Set categorie
     *
     * @param App\Entity\Categorie $categorie
     *
     * @return Article
     */
    public function setCategorie(App\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return App\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function __toString() {
        return $this->getNom();
    }

}
