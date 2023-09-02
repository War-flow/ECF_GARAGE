<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Texte = null;

    #[ORM\ManyToOne(inversedBy: 'details')]
    private ?Voitures $Voiture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexte(): ?string
    {
        return $this->Texte;
    }

    public function setTexte(string $Texte): static
    {
        $this->Texte = $Texte;

        return $this;
    }

    public function getVoiture(): ?Voitures
    {
        return $this->Voiture;
    }

    public function setVoiture(?Voitures $Voiture): static
    {
        $this->Voiture = $Voiture;

        return $this;
    }
}
