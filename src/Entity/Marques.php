<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarquesRepository::class)]
class Marques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $marque = null;

    #[ORM\OneToMany(targetEntity: Modeles::class, mappedBy: 'id_marque')]
    private Collection $id_modele;

    public function __construct()
    {
        $this->id_modele = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }


    public function __toString()
    {
         return $this->marque;
         return $this->id_modele;
    }

    /**
     * @return Collection<int, Modeles>
     */
    public function getIdModele(): Collection
    {
        return $this->id_modele;
    }

    public function addIdModele(Modeles $idModele): static
    {
        if (!$this->id_modele->contains($idModele)) {
            $this->id_modele->add($idModele);
            $idModele->setIdMarque($this);
        }

        return $this;
    }

    public function removeIdModele(Modeles $idModele): static
    {
        if ($this->id_modele->removeElement($idModele)) {
            // set the owning side to null (unless already changed)
            if ($idModele->getIdMarque() === $this) {
                $idModele->setIdMarque(null);
            }
        }

        return $this;
    }
}
