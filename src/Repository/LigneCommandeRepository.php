<?php

namespace App\Repository;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\EntityRepository;

/**
 * ligneCommandeRepository
 *
 */
class LigneCommandeRepository extends EntityRepository
{
   public function getLignesByIdCommande($id_commande){
        return $this->_em->createQueryBuilder()
                ->select('l')
                ->from('mi03VitrineBundle:LigneCommande', 'l')
                ->where('l.commande = :commande')
                    ->setParameter('commande', $id_commande)
                ->getQuery()
                ->getResult();
    }
    /**
     * On vend le surplus
     *
     */
    public function getArticlesConseillés($id_article){
        return $this->_em->createQueryBuilder()
            ->select('a')
            ->from('mi03VitrineBundle:Article', 'a')
            ->where('a.stock < 30')
            ->orderBy('a.stock')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }
    public function getArticlesPlusVendus(){
        return $this->_em->createQueryBuilder()
                ->select('a, Count(l.article)*l.quantite as nbCmd')
                ->from('mi03VitrineBundle:LigneCommande', 'l')
                ->join('mi03VitrineBundle:Article', 'a')
                ->where('a.id = l.article')
                ->groupBy('a')
                ->orderBy('nbCmd', 'DESC')
                ->setMaxResults(4)
                ->getQuery()
                ->getResult();
    }
    

}
