<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleSaison = null;

    #[ORM\OneToMany(mappedBy: 'idSaison', targetEntity: Semaine::class, orphanRemoval: true)]
    private Collection $semaines;

    #[ORM\OneToMany(mappedBy: 'idSaison', targetEntity: AvoirPourTarif::class, orphanRemoval: true)]
    private Collection $avoirPourTarifs;

    public function __construct()
    {
        $this->semaines = new ArrayCollection();
        $this->avoirPourTarifs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleSaison(): ?string
    {
        return $this->libelleSaison;
    }

    public function setLibelleSaison(string $libelleSaison): static
    {
        $this->libelleSaison = $libelleSaison;

        return $this;
    }

    /**
     * @return Collection<int, Semaine>
     */
    public function getSemaines(): Collection
    {
        return $this->semaines;
    }

    public function addSemaine(Semaine $semaine): static
    {
        if (!$this->semaines->contains($semaine)) {
            $this->semaines->add($semaine);
            $semaine->setIdSaison($this);
        }

        return $this;
    }

    public function removeSemaine(Semaine $semaine): static
    {
        if ($this->semaines->removeElement($semaine)) {
            // set the owning side to null (unless already changed)
            if ($semaine->getIdSaison() === $this) {
                $semaine->setIdSaison(null);
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
            $avoirPourTarif->setIdSaison($this);
        }

        return $this;
    }

    public function removeAvoirPourTarif(AvoirPourTarif $avoirPourTarif): static
    {
        if ($this->avoirPourTarifs->removeElement($avoirPourTarif)) {
            // set the owning side to null (unless already changed)
            if ($avoirPourTarif->getIdSaison() === $this) {
                $avoirPourTarif->setIdSaison(null);
            }
        }

        return $this;
    }
}
