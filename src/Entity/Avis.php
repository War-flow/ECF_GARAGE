<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 8,
        max: 255,
        minMessage: 'Le titre doit faire au moins {{ limit }}',
        maxMessage: 'Le titre ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 8,
        max: 500,
        minMessage: 'Le titre doit faire au moins {{ limit }}',
        maxMessage: 'Le titre ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Message = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero(message: 'Le champ ne peut pas être négatif.')]
    private ?int $Note = null;

    #[ORM\Column (nullable: true)]
    private ?string $Validation = null;

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

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): static
    {
        $this->Note = $Note;

        return $this;
    }

    public function getValidation(): ?string
    {
        return $this->Validation;
    }

    public function setValidation(string $Validation): static
    {
        $this->Validation = $Validation;

        return $this;
    }
}
