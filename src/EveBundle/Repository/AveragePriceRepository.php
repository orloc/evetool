<?php

namespace EveBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AveragePriceRepository extends EntityRepository {

    public function getAveragePriceByType($typeId){
        return $this->createQueryBuilder('ap')
            ->select('ap')
            ->where('r.type_id = :id')
            ->setParameter('id', $typeId)
            ->getQuery()->getOneOrNullResult();

    }

    public function findInList(array $ids){
        return $this->createQueryBuilder('ap')
            ->select('ap')
            ->where('ap.type_id IN (:type_ids)')
            ->setParameter('type_ids', $ids)
            ->getQuery()->getResult();
    }

}

