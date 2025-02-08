<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
#[UniqueEntity('nom', message: 'ce nom est deja utilisée')]
#[UniqueEntity('slug',message: 'ce slug est deja utilisée')]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['plat.index','categorie.index'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 5, minMessage: 'Le nom doit contenir au moins 5 caractères')]
    #[Groups(['plat.index','plat.create','categorie.index'])]
    private ?string $nom = '';

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 5, minMessage: 'Le slug doit contenir au moins 5 caractères')]
    #[Assert\Regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', message: 'Le slug doit contenir uniquement des lettres minuscules, des chiffres et des tirets.')]
    #[Groups(['plat.index','plat.create','categorie.index'])]
    private ?string $slug = '';
    

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 5, minMessage: 'La description doit contenir au moins 5 caractères')]
    #[Assert\NotBlank(message: 'cette valeur est obligatoire')]
    #[Groups(['plat.index','plat.create','categorie.index'])]
    private ?string $description = '';

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $UpdatedAt = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero()]
    #[Assert\LessThan(value:1440 , message: 'oops! une recette ne peut pas durer plus de 24 heures')]
    #[Groups(['plat.index','plat.create'])]
    private ?int $duration = null;

    #[ORM\ManyToOne(inversedBy: 'plats',cascade: ['persist'])]
    #[Groups(['plat.index','plat.create','categorie.index'])]
    private ?Categorie $categorie = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $UpdatedAt): static
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
