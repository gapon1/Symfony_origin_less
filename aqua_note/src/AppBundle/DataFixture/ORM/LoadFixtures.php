<?php

namespace AppBundle\DataFixture\ORM;


use Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\FixtureSet;
use Nelmio\Alice\Loader\FakeDataLoader;
use Nelmio\Alice\Loader\NativeLoader;


class LoadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $files = [
            'genus' => __DIR__.'/fixters.yml',
        ];

        $loader    = new NativeLoader();
        $objectSet = $loader->loadFiles($files);

        foreach ($objectSet->getObjects() as $key => $object) {
            $this->addReference($key, $object);
            $manager->persist($object);
        }

        $manager->flush();
    }

    public function genus()
    {
        $genera = [
            'Octopus',
            'Balaena',
            'Orcinus',
            'Hippocampus',
            'Asterias',
            'Amphiprion',
            'Carcharodon',
            'Aurelia',
            'Cucumaria',
            'Balistoides',
            'Paralithodes',
            'Chelonia',
            'Trichechus',
            'Eumetopias'
        ];

        $key = array_rand($genera);

        return $genera[$key];
    }


}