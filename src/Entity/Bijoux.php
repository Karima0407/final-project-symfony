<?php

namespace App\Entity;

use App\Repository\BijouxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BijouxRepository::class)]
class Bijoux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_bijoux = null;

    #[ORM\Column(length: 255)]
    private ?string $imageBijoux = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionDetaille = null;

    #[ORM\Column]
    private ?int $prix = null;

    public function getId(): ?int
    {
        return $this->id_bijoux;
    }

    public function getImageBijoux(): ?string
    {
        return $this->imageBijoux;
    }

    public function setImageBijoux(string $imageBijoux): static
    {
        $this->imageBijoux = $imageBijoux;

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
