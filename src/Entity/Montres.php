<?php

namespace App\Entity;

use App\Repository\MontresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MontresRepository::class)]
class Montres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_montres = null;

    #[ORM\Column(length: 255)]
    private ?string $imageMontre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionDetaille = null;

    #[ORM\Column]
    private ?int $prix = null;

    public function getId(): ?int
    {
        return $this->id_montres;
    }

    public function getImageMontre(): ?string
    {
        return $this->imageMontre;
    }

    public function setImageMontre(string $imageMontre): static
    {
        $this->imageMontre = $imageMontre;

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
