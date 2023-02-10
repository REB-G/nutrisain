<?php

namespace App\DataFixtures;

use App\Entity\Allergies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AllergiesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'Moutarde',
            'Crustacés',
            'Oeufs',
            'Poissons',
            'Arachides',
            'Lactose',
        ];
        for ($i=1; $i <= 6; $i++) {
            $allergy = new Allergies();

            $allergy->setName($names[$i-1]);

            $manager->persist($allergy);
        }
        $manager->flush();
    }
}
