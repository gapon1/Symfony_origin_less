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

class GenusNoteRepository extends EntityRepository
{


    public function findAllRecentNoteForGenus(Genus $genus)
    {
        return $this
            ->createQueryBuilder('genus_note')
            ->andWhere('genus_note.genus = :genus')
            ->setParameter('genus', $genus)
            ->andWhere('genus_note.createdAt > :recentDate')
            ->setParameter('recentDate', new \DateTime('-3 months'))
            ->getQuery()
            ->execute();

    }
}