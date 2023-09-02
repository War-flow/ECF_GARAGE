<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $Price = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $year = null;

    #[ORM\Column]
    private ?int $Mile = null;

    #[ORM\OneToMany(mappedBy: 'Voiture', targetEntity: Detail::class)]
    private Collection $details;

    #[ORM\OneToMany(mappedBy: 'Voiture_id', targetEntity: Option::class)]
    private Collection $options;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getYear(): ?\DateTimeImmutable
    {
        return $this->year;
    }

    public function setYear(\DateTimeImmutable $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getMile(): ?int
    {
        return $this->Mile;
    }

    public function setMile(int $Mile): static
    {
        $this->Mile = $Mile;

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): static
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setVoiture($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): static
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getVoiture() === $this) {
                $detail->setVoiture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
            $option->setVoitureId($this);
        }

        return $this;
    }

    public function removeOption(Option $option): static
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getVoitureId() === $this) {
                $option->setVoitureId(null);
            }
        }

        return $this;
    }
}
