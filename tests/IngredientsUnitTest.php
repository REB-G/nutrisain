<?php

namespace App\Tests;

use App\Entity\Ingredients;
use PHPUnit\Framework\TestCase;

class IngredientsUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $ingredient = new Ingredients();

        $ingredient->setName('name');

        $this->assertTrue($ingredient->getName() === 'name');
    }

    public function testIsFalse(): void
    {
        $ingredient = new Ingredients();

        $ingredient->setName('name');

        $this->assertFalse($ingredient->getName() === 'false');
    }

    public function testIsEmpty(): void
    {
        $ingredient = new Ingredients();

        $this->assertEmpty($ingredient->getName());
    }
}
