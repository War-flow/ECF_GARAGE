<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $Days = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero]
    #[Assert\LessThanOrEqual(23, message: 'le nombre doit être egale ou infériereur à 23')]
    private ?int $AMHO = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero(message: 'le nombre ne peux pas être négative')]
    #[Assert\LessThanOrEqual(23, message: 'le nombre doit être egale ou infériereur à 23')]
    private ?int $AMHC = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero(message: 'le nombre ne peux pas être négative')]
    #[Assert\LessThanOrEqual(23, message: 'le nombre doit être egale ou infériereur à 23')]
    private ?int $PMHO = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero(message: 'le nombre ne peux pas être négative')]
    #[Assert\LessThanOrEqual(23, message: 'le nombre doit être egale ou infériereur à 23')]
    private ?int $PMHC = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->Days;
    }

    public function setDays(string $Days): static
    {
        $this->Days = $Days;

        return $this;
    }

    public function getAMHO(): ?int
    {
        return $this->AMHO;
    }

    public function setAMHO(int $AMHO): static
    {
        $this->AMHO = $AMHO;

        return $this;
    }

    public function getAMHC(): ?int
    {
        return $this->AMHC;
    }

    public function setAMHC(int $AMHC): static
    {
        $this->AMHC = $AMHC;

        return $this;
    }

    public function getPMHO(): ?int
    {
        return $this->PMHO;
    }

    public function setPMHO(int $PMHO): static
    {
        $this->PMHO = $PMHO;

        return $this;
    }

    public function getPMHC(): ?int
    {
        return $this->PMHC;
    }

    public function setPMHC(int $PMHC): static
    {
        $this->PMHC = $PMHC;

        return $this;
    }
}
