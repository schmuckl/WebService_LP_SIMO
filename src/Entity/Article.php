<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(name="libelle", type="string", length=100, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    private $categorie;

    /*
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", inversedBy="article")
     * @ORM\JoinTable(name="lignescommande",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="commande_id", referencedColumnName="id")
     *   }
     * )
     */
    //private $commande;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="LignesCommande", mappedBy="Article")
     */
    private $lignesCommande;

    /**
     * Constructor
     */
    public function __construct() {
        $this->lignesCommande = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
//
//    /**
//     * @return Collection|Commande[]
//     */
//    public function getCommande(): Collection
//    {
//        return $this->commande;
//    }
//
//    public function addCommande(Commande $commande): self
//    {
//        if (!$this->commande->contains($commande)) {
//            $this->commande[] = $commande;
//        }
//
//        return $this;
//    }
//
//    public function removeCommande(Commande $commande): self
//    {
//        if ($this->commande->contains($commande)) {
//            $this->commande->removeElement($commande);
//        }
//
//        return $this;
//    }
//
//    /**
//     * @return Collection|LignesCommande[]
//     */
//    public function getLignesCommande(): Collection
//    {
//        return $this->lignesCommande;
//    }
//
//    public function addLignesCommande(LignesCommande $lignesCommande): self
//    {
//        if (!$this->lignesCommande->contains($lignesCommande)) {
//            $this->lignesCommande[] = $lignesCommande;
//            $lignesCommande->setArticle($this);
//        }
//
//        return $this;
//    }
//
//    public function removeLignesCommande(LignesCommande $lignesCommande): self
//    {
//        if ($this->lignesCommande->contains($lignesCommande)) {
//            $this->lignesCommande->removeElement($lignesCommande);
//            // set the owning side to null (unless already changed)
//            if ($lignesCommande->getArticle() === $this) {
//                $lignesCommande->setArticle(null);
//            }
//        }
//
//        return $this;
//    }

}
