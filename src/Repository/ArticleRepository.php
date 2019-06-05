<?php

namespace App\Repository;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ArticleRepository
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function getArticle($id){
        return $this->_em->createQueryBuilder()
            ->select('a')
            ->from('VitrineBundle:Article', 'a')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function getArticlesbyCategorie($id_categorie){
        return $this->_em->createQueryBuilder()
            ->select('a')
            ->from('VitrineBundle:Article', 'a')
            ->where('a.categorie = :categorie')
            ->setParameter('categorie', $id_categorie)
            ->getQuery()
            ->getResult();
    }

    public function getArticlesRupture(){
        return $this->_em->createQueryBuilder()
            ->select('a')
            ->from('VitrineBundle:Article', 'a')
            ->where('a.stock < 20')
            ->orderBy('a.stock')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }
}
