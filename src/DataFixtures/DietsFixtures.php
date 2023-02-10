<?php

namespace App\DataFixtures;

use App\Entity\Diets;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DietsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'Végétarien',
            'Sans sel',
            'Sans gluten',
            'Sans lactose',
            'Sans sucre',
            'Sans gras',
            'Sans oeuf',
            'Sans soja',
            'Sans arachide',
            'Sans poisson',
            'Sans crustacé',
            'Sans mollusque',
            'Sans fruits à coque',
            'Sans céleri',
            'Sans moutarde',
            'Sans sésame',
            'Végan',
            'Sans fructose'
        ];
        for ($i=1; $i <= 18 ; $i++) {
            $diet = new Diets();

            $diet->setName($names[$i-1]);

            $manager->persist($diet);
        }
        $manager->flush();
    }
}
