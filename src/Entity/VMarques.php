<?php

namespace App\Entity;

use App\Repository\VMarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VMarquesRepository::class)]
class VMarques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Voitures::class, mappedBy: 'id_marque')]
    private Collection $marque;

    #[ORM\Column(length: 100)]
    private ?string $marques = null;

    #[ORM\OneToMany(targetEntity: VModeles::class, mappedBy: 'marque')]
    private Collection $modele;

    public function __construct()
    {
        $this->marque = new ArrayCollection();
        $this->modele = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->marques;
        return $this->modele;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, voitures>
     */
    public function getMarque(): Collection
    {
        return $this->marque;
    }

    public function addMarque(voitures $marque): static
    {
        if (!$this->marque->contains($marque)) {
            $this->marque->add($marque);
            $marque->setIdMarque($this);
        }

        return $this;
    }

    public function removeMarque(voitures $marque): static
    {
        if ($this->marque->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getIdMarque() === $this) {
                $marque->setIdMarque(null);
            }
        }

        return $this;
    }

    public function getMarques(): ?string
    {
        return $this->marques;
    }

    public function setMarques(string $marques): static
    {
        $this->marques = $marques;

        return $this;
    }

    /**
     * @return Collection<int, VModeles>
     */
    public function getModele(): Collection
    {
        return $this->modele;
    }

    public function addModele(VModeles $modele): static
    {
        if (!$this->modele->contains($modele)) {
            $this->modele->add($modele);
            $modele->setMarque($this);
        }

        return $this;
    }

    public function removeModele(VModeles $modele): static
    {
        if ($this->modele->removeElement($modele)) {
            // set the owning side to null (unless already changed)
            if ($modele->getMarque() === $this) {
                $modele->setMarque(null);
            }
        }

        return $this;
    }
}
