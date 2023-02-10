<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Recipes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipesFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    
    public function load(ObjectManager $manager): void
    {
        $titles = [
            'Hachis parmentier',
            'Lasagnes',
            'Poulet au curry',
            'Pâtes carbonara',
            'Pâtes à la bolognaise',
            'Pâtes au pesto',
            'Poisson en croûte de sel',
            'Poisson en papillote',
            'Salade de chèvre chaud',
            'Salade de pâtes',
            'Salade de riz',
            'Salade de tomates',
            'Salade de quinoa',
            'Salade de lentilles',
            'Rôtie de porc',
            'Rôti de boeuf',
            'Rôti de poulet',
            'Gratin d\'aubergines',
            'Gratin de courgettes',
            'Gratin dauphinois',
            'Soupe de légumes',
            'Soupe de poissons',
            'wok de légumes',
            'wok de poulet',
            'wok de crevettes'
        ];

        for ($i=1; $i <= 19 ; $i++) {
            $recipe = new Recipes();

            $recipe->setTitle($titles[$i-1]);
            $recipe->setDescription($this->faker->text(200));
            $recipe->setNbrPeople($this->faker->numberBetween(1, 6));
            $recipe->setpreparationTime($this->faker->numberBetween(10, 60));
            $recipe->setRestTime($this->faker->numberBetween(10, 60));
            $recipe->setCookingTime($this->faker->numberBetween(10, 60));
            $recipe->setTotalRecipeTime($this->faker->numberBetween(10, 60));
            $recipe->setStagesOfRecipe($this->faker->text(200));

            $manager->persist($recipe);
        }
        $manager->flush();
    }
}

