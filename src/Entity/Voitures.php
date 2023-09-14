<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?int $miles = null;

    #[ORM\Column(length: 255)]
    private ?string $Op1 = null;

    #[ORM\Column(length: 255)]
    private ?string $Op2 = null;

    #[ORM\Column(length: 255)]
    private ?string $Op3 = null;

    #[ORM\Column(length: 255)]
    private ?string $Feat1 = null;

    #[ORM\Column(length: 255)]
    private ?string $Feat2 = null;

    #[ORM\Column(length: 255)]
    private ?string $Feat3 = null;

    #[ORM\Column(length: 255)]
    private ?string $Fuel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getMiles(): ?int
    {
        return $this->miles;
    }

    public function setMiles(int $miles): static
    {
        $this->miles = $miles;

        return $this;
    }

    public function getOp1(): ?string
    {
        return $this->Op1;
    }

    public function setOp1(string $Op1): static
    {
        $this->Op1 = $Op1;

        return $this;
    }

    public function getOp2(): ?string
    {
        return $this->Op2;
    }

    public function setOp2(string $Op2): static
    {
        $this->Op2 = $Op2;

        return $this;
    }

    public function getOp3(): ?string
    {
        return $this->Op3;
    }

    public function setOp3(string $Op3): static
    {
        $this->Op3 = $Op3;

        return $this;
    }

    public function getFeat1(): ?string
    {
        return $this->Feat1;
    }

    public function setFeat1(string $Feat1): static
    {
        $this->Feat1 = $Feat1;

        return $this;
    }

    public function getFeat2(): ?string
    {
        return $this->Feat2;
    }

    public function setFeat2(string $Feat2): static
    {
        $this->Feat2 = $Feat2;

        return $this;
    }

    public function getFeat3(): ?string
    {
        return $this->Feat3;
    }

    public function setFeat3(string $Feat3): static
    {
        $this->Feat3 = $Feat3;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->Fuel;
    }

    public function setFuel(string $Fuel): static
    {
        $this->Fuel = $Fuel;

        return $this;
    }
}
