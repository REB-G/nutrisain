<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 20; $i++) {
            $user = new Users();

            $user->setName($this->faker->lastName());
            $user->setFirstname($this->faker->firstName());
            $user->setEmail($this->faker->email());
            $user->setPassword($this->faker->password());

            $manager->persist($user);
        }
        $manager->flush();
    }
}

