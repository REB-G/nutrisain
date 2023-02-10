<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $options = [
            'Carottes',
            'Oignons',
            'Pommes de terre',
            'Poivrons',
            'Tomates',
            'Courgettes',
            'Aubergines',
            'Champignons',
            'Piments',
            'Concombres',
            'Haricots verts',
            'Pois',
            'Brocolis',
            'Choux',
            'Artichauts',
            'Asperges',
            'sel',
            'poivre',
            'huile d\'olive',
            'vinaigre',
            'sucre',
            'farine',
            'levure',
            'beurre',
            'lait',
            'crème fraîche',
            'oeufs',
            'fromage',
            'jambon',
            'saucisses',
            'pâtes',
            'riz',
            'pommes',
            'bananes',
            'poires',
            'pêches',
            'abricots',
            'fraises',
            'framboises',
            'mûres'
        ];
        for ($i=1; $i <=40; $i++) {
            $ingredient = new Ingredients();

            $ingredient->setName($options[$i-1]);

            $manager->persist($ingredient);
        }
        $manager->flush();
    }
}
