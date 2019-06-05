<?php

namespace App\Repository;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\EntityRepository;

/**
 * CommandeRepository
 */
class CommandeRepository extends EntityRepository
{
    public function getCommandesByIdClient($id){
        return $this->_em->createQueryBuilder()
                ->select('c')
                ->from('VitrineBundle:Commande', 'c')
                ->join('c.client', 'e')
                ->where('e.id = :id')
                    ->setParameter('id', $id)
                ->getQuery()
                ->getResult();
    }
}
