<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un nom de catégorie.')]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Recipes::class)]
    private Collection $recipe;

    public function __construct()
    {
        $this->recipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(Recipes $recipe): self
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe->add($recipe);
            $recipe->setCategory($this);
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): self
    {
        if ($this->recipe->removeElement($recipe)) {
            // set the owning side to null (unless already changed)
            if ($recipe->getCategory() === $this) {
                $recipe->setCategory(null);
            }
        }

        return $this;
    }
}
