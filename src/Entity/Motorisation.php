<?php

namespace App\Entity;

use App\Repository\MotorisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotorisationRepository::class)]
class Motorisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $motorisation = null;

    #[ORM\ManyToOne(inversedBy: 'id_motorisation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Modeles $id_modele = null;

    #[ORM\OneToMany(targetEntity: Services::class, mappedBy: 'id_motorisation')]
    private Collection $id_service;

    public function __construct()
    {
        $this->id_service = new ArrayCollection();
    }
    public function __toString()
    {
         return $this->motorisation;
         return $this->id_modele;
         return $this->id_service;
         
         
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotorisation(): ?string
    {
        return $this->motorisation;
    }

    public function setMotorisation(string $motorisation): static
    {
        $this->motorisation = $motorisation;

        return $this;
    }

    public function getIdModele(): ?Modeles
    {
        return $this->id_modele;
    }

    public function setIdModele(?Modeles $id_modele): static
    {
        $this->id_modele = $id_modele;

        return $this;
    }

   

    /**
     * @return Collection<int, Services>
     */
    public function getIdService(): Collection
    {
        return $this->id_service;
    }

    public function addIdService(Services $idService): static
    {
        if (!$this->id_service->contains($idService)) {
            $this->id_service->add($idService);
            $idService->setIdMotorisation($this);
        }

        return $this;
    }

    public function removeIdService(Services $idService): static
    {
        if ($this->id_service->removeElement($idService)) {
            // set the owning side to null (unless already changed)
            if ($idService->getIdMotorisation() === $this) {
                $idService->setIdMotorisation(null);
            }
        }

        return $this;
    }
}
