<?php

namespace App\DataFixtures;

use App\Entity\Difficulties;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DifficultiesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'Facile',
            'Moyen',
            'Difficile',
            'Très difficile'
        ];
        for ($i=1; $i <= 4 ; $i++) {
            $difficulty = new Difficulties();

            $difficulty->setName($names[$i-1]);

            $manager->persist($difficulty);
        }
        $manager->flush();
    }
}
