<?php

namespace App\Entity;

use App\Repository\RecipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RecipesRepository::class)]
class Recipes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un titre.')]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une description.')]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $nbrPeople = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Veuillez renseigner un temps de préparation.')]
    private ?int $preparationTime = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Veuillez renseigner un temps de repos.')]
    private ?int $restTime = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Veuillez renseigner un temps de cuisson.')]
    private ?int $cookingTime = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Veuillez renseigner un temps total de préparation.')]
    private ?int $totalRecipeTime = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les étapes de prépation de la recette.')]
    private ?string $stagesOfRecipe = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Diets::class, inversedBy: 'recipe')]
    private Collection $diet;

    #[ORM\ManyToOne(inversedBy: 'recipe')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Difficulties $difficulty = null;

    #[ORM\ManyToOne(inversedBy: 'recipe')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $category = null;

    #[ORM\ManyToMany(targetEntity: Allergies::class, inversedBy: 'recipe')]
    private Collection $allergy;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->diet = new ArrayCollection();
        $this->allergy = new ArrayCollection();
    }

    public function preUpdatedAt(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNbrPeople(): ?int
    {
        return $this->nbrPeople;
    }

    public function setNbrPeople(int $nbrPeople): self
    {
        $this->nbrPeople = $nbrPeople;

        return $this;
    }

    public function getPreparationTime(): ?int
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(int $preparationTime): self
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    public function getRestTime(): ?int
    {
        return $this->restTime;
    }

    public function setRestTime(int $restTime): self
    {
        $this->restTime = $restTime;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->cookingTime;
    }

    public function setCookingTime(int $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getTotalRecipeTime(): ?int
    {
        return $this->totalRecipeTime;
    }

    public function setTotalRecipeTime(int $totalRecipeTime): self
    {
        $this->totalRecipeTime = $totalRecipeTime;

        return $this;
    }

    public function getStagesOfRecipe(): ?string
    {
        return $this->stagesOfRecipe;
    }

    public function setStagesOfRecipe(string $stagesOfRecipe): self
    {
        $this->stagesOfRecipe = $stagesOfRecipe;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDiet(): Collection
    {
        return $this->diet;
    }

    public function addDiet(Diets $diet): self
    {
        if (!$this->diet->contains($diet)) {
            $this->diet->add($diet);
        }

        return $this;
    }

    public function removeDiet(Diets $diet): self
    {
        $this->diet->removeElement($diet);

        return $this;
    }

    public function getDifficulty(): ?Difficulties
    {
        return $this->difficulty;
    }

    public function setDifficulty(?Difficulties $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAllergy(): Collection
    {
        return $this->allergy;
    }

    public function addAllergy(Allergies $allergy): self
    {
        if (!$this->allergy->contains($allergy)) {
            $this->allergy->add($allergy);
        }

        return $this;
    }

    public function removeAllergy(Allergies $allergy): self
    {
        $this->allergy->removeElement($allergy);

        return $this;
    }
}
