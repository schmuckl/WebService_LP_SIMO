<?php

namespace App\Repository;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * CategorieRepository
 *
 */
class CategorieRepository extends \Doctrine\ORM\EntityRepository
{
    public function getCategorie($id){
        return $this->_em->createQueryBuilder()
            ->select('c')
            ->from('VitrineBundle:Categorie', 'c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
}
