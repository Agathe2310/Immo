<?php

namespace App\Entity;

use App\Repository\AvoirPourTarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoirPourTarifRepository::class)]
class AvoirPourTarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prixSemaine = null;

    #[ORM\ManyToOne(inversedBy: 'avoirPourTarifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $idCategorie = null;

    #[ORM\ManyToOne(inversedBy: 'avoirPourTarifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Saison $idSaison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixSemaine(): ?float
    {
        return $this->prixSemaine;
    }

    public function setPrixSemaine(float $prixSemaine): static
    {
        $this->prixSemaine = $prixSemaine;

        return $this;
    }

    public function getIdCategorie(): ?Categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?Categorie $idCategorie): static
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function getIdSaison(): ?Saison
    {
        return $this->idSaison;
    }

    public function setIdSaison(?Saison $idSaison): static
    {
        $this->idSaison = $idSaison;

        return $this;
    }
}
