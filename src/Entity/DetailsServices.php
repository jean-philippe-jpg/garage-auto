<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\DetailsServicesRepository;

#[ORM\Entity(repositoryClass: DetailsServicesRepository::class)]
#[ApiResource]
class DetailsServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $tarifs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

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

    public function getTarifs(): ?int
    {
        return $this->tarifs;
    }

    public function setTarifs(int $tarifs): static
    {
        $this->tarifs = $tarifs;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitre().''.$this->getDescription();
    }
}
