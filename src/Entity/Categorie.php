<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleCategorie = null;

    #[ORM\OneToMany(mappedBy: 'idCategorie', targetEntity: Appartement::class, orphanRemoval: true)]
    private Collection $appartements;

    #[ORM\OneToMany(mappedBy: 'idCategorie', targetEntity: AvoirPourTarif::class, orphanRemoval: true)]
    private Collection $avoirPourTarifs;

    public function __construct()
    {
        $this->appartements = new ArrayCollection();
        $this->avoirPourTarifs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCategorie(): ?string
    {
        return $this->libelleCategorie;
    }

    public function setLibelleCategorie(string $libelleCategorie): static
    {
        $this->libelleCategorie = $libelleCategorie;

        return $this;
    }

    /**
     * @return Collection<int, Appartement>
     */
    public function getAppartements(): Collection
    {
        return $this->appartements;
    }

    public function addAppartement(Appartement $appartement): static
    {
        if (!$this->appartements->contains($appartement)) {
            $this->appartements->add($appartement);
            $appartement->setIdCategorie($this);
        }

        return $this;
    }

    public function removeAppartement(Appartement $appartement): static
    {
        if ($this->appartements->removeElement($appartement)) {
            // set the owning side to null (unless already changed)
            if ($appartement->getIdCategorie() === $this) {
                $appartement->setIdCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AvoirPourTarif>
     */
    public function getAvoirPourTarifs(): Collection
    {
        return $this->avoirPourTarifs;
    }

    public function addAvoirPourTarif(AvoirPourTarif $avoirPourTarif): static
    {
        if (!$this->avoirPourTarifs->contains($avoirPourTarif)) {
            $this->avoirPourTarifs->add($avoirPourTarif);
            $avoirPourTarif->setIdCategorie($this);
        }

        return $this;
    }

    public function removeAvoirPourTarif(AvoirPourTarif $avoirPourTarif): static
    {
        if ($this->avoirPourTarifs->removeElement($avoirPourTarif)) {
            // set the owning side to null (unless already changed)
            if ($avoirPourTarif->getIdCategorie() === $this) {
                $avoirPourTarif->setIdCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleCategorie(); // Replace with the actual property you want to convert to a string.
    }
}
