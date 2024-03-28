<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(targetEntity: DetailsServices::class, mappedBy: 'id_service')]
    private Collection $id_detail;

    public function __construct()
    {
        $this->id_detail = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, DetailsServices>
     */
    public function getIdDetail(): Collection
    {
        return $this->id_detail;
    }

    public function addIdDetail(DetailsServices $idDetail): static
    {
        if (!$this->id_detail->contains($idDetail)) {
            $this->id_detail->add($idDetail);
            $idDetail->setIdService($this);
        }

        return $this;
    }

    public function removeIdDetail(DetailsServices $idDetail): static
    {
        if ($this->id_detail->removeElement($idDetail)) {
            // set the owning side to null (unless already changed)
            if ($idDetail->getIdService() === $this) {
                $idDetail->setIdService(null);
            }
        }

        return $this;
    }
}
