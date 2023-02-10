<?php

namespace App\Tests;

use App\Entity\Recipes;
use PHPUnit\Framework\TestCase;

class RecipesUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $recipe = new Recipes();

        $recipe->setTitle('title')
            ->setDescription('description')
            ->setNbrPeople(6)
            ->setPreparationTime(60)
            ->setRestTime(30)
            ->setCookingTime(30)
            ->setTotalRecipeTime(30)
            ->setStagesOfRecipe('stages')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());

        $this->assertTrue($recipe->getTitle() === 'title');
        $this->assertTrue($recipe->getDescription() === 'description');
        $this->assertTrue($recipe->getNbrPeople() === 6);
        $this->assertTrue($recipe->getPreparationTime() === 60);
        $this->assertTrue($recipe->getRestTime() === 30);
        $this->assertTrue($recipe->getCookingTime() === 30);
        $this->assertTrue($recipe->getTotalRecipeTime() === 30);
        $this->assertTrue($recipe->getStagesOfRecipe() === 'stages');
        $this->assertTrue($recipe->getCreatedAt() instanceof \DateTimeImmutable);
        $this->assertTrue($recipe->getUpdatedAt() instanceof \DateTimeImmutable);
    }

    public function testIsFalse(): void
    {
        $recipe = new Recipes();

        $recipe->setTitle('title')
            ->setDescription('description')
            ->setNbrPeople(6)
            ->setPreparationTime(60)
            ->setRestTime(30)
            ->setCookingTime(30)
            ->setTotalRecipeTime(30)
            ->setStagesOfRecipe('stages')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());

        $this->assertFalse($recipe->getTitle() === 'false');
        $this->assertFalse($recipe->getDescription() === 'false');
        $this->assertFalse($recipe->getNbrPeople() === 'false');
        $this->assertFalse($recipe->getPreparationTime() === 'false');
        $this->assertFalse($recipe->getRestTime() === 'false');
        $this->assertFalse($recipe->getCookingTime() === 'false');
        $this->assertFalse($recipe->getTotalRecipeTime() === 'false');
        $this->assertFalse($recipe->getStagesOfRecipe() === 'false');
        $this->assertFalse($recipe->getCreatedAt() instanceof \DateTime);
        $this->assertFalse($recipe->getUpdatedAt() instanceof \DateTime);
    }

    public function testIsEmpty(): void
    {
        $recipe = new Recipes();

        $this->assertEmpty($recipe->getTitle());
        $this->assertEmpty($recipe->getDescription());
        $this->assertEmpty($recipe->getNbrPeople());
        $this->assertEmpty($recipe->getPreparationTime());
        $this->assertEmpty($recipe->getRestTime());
        $this->assertEmpty($recipe->getCookingTime());
        $this->assertEmpty($recipe->getTotalRecipeTime());
        $this->assertEmpty($recipe->getStagesOfRecipe());
    }
}
