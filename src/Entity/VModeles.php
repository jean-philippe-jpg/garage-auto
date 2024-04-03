<?php

namespace App\Entity;

use App\Repository\VModelesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VModelesRepository::class)]
class VModeles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Voitures::class, mappedBy: 'id_modele')]
    private Collection $modele;

    #[ORM\Column(length: 100)]
    private ?string $modeles = null;

    #[ORM\ManyToOne(inversedBy: 'modele')]
    private ?VMarques $marque = null;

    public function __construct()
    {
        $this->modele = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->modeles;
    }
      
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, voitures>
     */
    public function getModele(): Collection
    {
        return $this->modele;
    }

    public function addModele(voitures $modele): static
    {
        if (!$this->modele->contains($modele)) {
            $this->modele->add($modele);
            $modele->setIdModele($this);
        }

        return $this;
    }

    public function removeModele(voitures $modele): static
    {
        if ($this->modele->removeElement($modele)) {
            // set the owning side to null (unless already changed)
            if ($modele->getIdModele() === $this) {
                $modele->setIdModele(null);
            }
        }

        return $this;
    }

    public function getModeles(): ?string
    {
        return $this->modeles;
    }

    public function setModeles(string $modeles): static
    {
        $this->modeles = $modeles;

        return $this;
    }

    public function getMarque(): ?VMarques
    {
        return $this->marque;
    }

    public function setMarque(?VMarques $marque): static
    {
        $this->marque = $marque;

        return $this;
    }
}
