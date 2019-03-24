<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-24
 * Time: 21:57
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class SubFamilyRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('sub_family')
            ->orderBy('sub_family.name', 'ASC');
    }
}
