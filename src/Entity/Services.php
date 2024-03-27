<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
//use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServicesRepository;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
#[ApiResource]

class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?DetailsServices $detailsServices = null;

    #[ORM\ManyToOne(inversedBy: 'id_service')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Motorisation $id_motorisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDetailsServices(): ?detailsServices
    {
        return $this->detailsServices;
        return $this->id_motorisation;
    }

    public function setDetailsServices(?detailsServices $detailsServices): static
    {
        $this->detailsServices = $detailsServices;

        return $this;
    }


    public function __toString()
    {
         return $this->getName();
    }

    public function getIdMotorisation(): ?Motorisation
    {
        return $this->id_motorisation;
    }

    public function setIdMotorisation(?Motorisation $id_motorisation): static
    {
        $this->id_motorisation = $id_motorisation;

        return $this;
    }
}
