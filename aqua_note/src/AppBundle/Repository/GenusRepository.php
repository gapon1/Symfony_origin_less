<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-22
 * Time: 17:47
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{

    /**
     * @return Genus[]
     *
     */
    public function findAllPublishedBySize()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->orderBy('genus.specCount', 'DESC')
            ->getQuery()
            ->execute();
    }
}