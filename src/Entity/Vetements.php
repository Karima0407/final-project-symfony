<?php

namespace App\Entity;

use App\Repository\VetementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VetementsRepository::class)]
class Vetements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_vetements = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionDetaille = null;

    #[ORM\Column]
    private ?int $prix = null;

    public function getId(): ?int
    {
        return $this->id_vetements;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

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

    public function getDescriptionDetaille(): ?string
    {
        return $this->descriptionDetaille;
    }

    public function setDescriptionDetaille(string $descriptionDetaille): static
    {
        $this->descriptionDetaille = $descriptionDetaille;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
