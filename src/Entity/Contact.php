<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Lastname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Firstname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Address = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Mail = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 20,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Phone = null;

    #[ORM\Column(length: 500)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 500,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Message = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 50,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $Subject = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    private ?int $ZipCode = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le champ doit être rempli.')]
    #[Assert\Length(
        min: 5,
        max: 100,
        minMessage: 'Le champ doit faire au moins {{ limit }}',
        maxMessage: 'Le champ ne doit pas faire plus de {{ limit }}'
    )]
    private ?string $City = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): static
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): static
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): static
    {
        $this->Address = $Address;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): static
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): static
    {
        $this->Phone = $Phone;

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

    public function getSubject(): ?string
    {
        return $this->Subject;
    }

    public function setSubject(string $Subject): static
    {
        $this->Subject = $Subject;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->ZipCode;
    }

    public function setZipCode(int $ZipCode): static
    {
        $this->ZipCode = $ZipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): static
    {
        $this->City = $City;

        return $this;
    }
}
