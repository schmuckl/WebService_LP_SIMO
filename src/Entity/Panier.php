<?php

# Entity/Panier.php
namespace App\Entity;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;

class Panier 
{
    private $contenu;

    public function __construct() {

    }
    public function getContenu() {
        return $this->contenu;
    }
    public function ajoutArticle($article, $quantite = 1) {
        // ajouter l'article $articleId du contenu
        $lePanier = $this->getContenu();
        if(isset($lePanier[$article])){
            $lePanier[$article] += $quantite;
        }else{
            $lePanier[$article] = $quantite;
        }
        $this->contenu = $lePanier;
    }
    public function supprimerArticle($articleId) {
        // supprimer l'article $articleId du contenu
        $lePanier = $this->getContenu();
        unset($lePanier[$articleId]);
        $this->contenu = $lePanier;
    }
    public function moreArticle($articleId) {
        // ajouter un article $articleId au contenu
        $lePanier = $this->getContenu();
        $lePanier[$articleId] += 1;
        $this->contenu = $lePanier;
    }
    public function lessArticle($articleId) {
        // enlever un article $articleId au contenu
        $lePanier = $this->getContenu();
        if($lePanier[$articleId]-1>0){
            $lePanier[$articleId]--;
        }else{
            $this->supprimerArticle($articleId);
        }
        $this->contenu = $lePanier;
    }
}