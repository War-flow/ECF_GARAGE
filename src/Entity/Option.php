<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionRepository::class)]
#[ORM\Table(name: '`option`')]
class Option
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Op = null;

    #[ORM\ManyToOne(inversedBy: 'options')]
    private ?Voitures $Voiture_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOp(): ?string
    {
        return $this->Op;
    }

    public function setOp(string $Op): static
    {
        $this->Op = $Op;

        return $this;
    }

    public function getVoitureId(): ?Voitures
    {
        return $this->Voiture_id;
    }

    public function setVoitureId(?Voitures $Voiture_id): static
    {
        $this->Voiture_id = $Voiture_id;

        return $this;
    }
}
