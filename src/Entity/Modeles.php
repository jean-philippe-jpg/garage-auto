<?php

namespace App\Entity;

use App\Repository\ModelesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelesRepository::class)]
class Modeles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $modele = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\ManyToOne(inversedBy: 'id_modele')]
    private ?Marques $id_marque ;

    #[ORM\OneToMany(targetEntity: Motorisation::class, mappedBy: 'id_modele')]
    private Collection $id_motorisation;

    public function __construct()
    {
        $this->id_motorisation = new ArrayCollection();
    }
    public function __toString()
    {
         return $this->getModele(); 
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getIdMarque(): ?Marques
    {
        return $this->id_marque;
    }

    public function setIdMarque(?Marques $id_marque): static
    {
        $this->id_marque = $id_marque;

        return $this;
    }


    


    /**
     * @return Collection<int, Motorisation>
     */
    public function getIdMotorisation(): Collection
    {
        return $this->id_motorisation;
    }

    public function addIdMotorisation(Motorisation $idMotorisation): static
    {
        if (!$this->id_motorisation->contains($idMotorisation)) {
            $this->id_motorisation->add($idMotorisation);
            $idMotorisation->setIdModele($this);
        }

        return $this;
    }

    public function removeIdMotorisation(Motorisation $idMotorisation): static
    {
        if ($this->id_motorisation->removeElement($idMotorisation)) {
            // set the owning side to null (unless already changed)
            if ($idMotorisation->getIdModele() === $this) {
                $idMotorisation->setIdModele(null);
            }
        }

        return $this;
    }
}
