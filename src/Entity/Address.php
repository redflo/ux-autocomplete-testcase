<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address of a User or Building or Claim
 */


#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // PLZ nur aus Deutschland zulassen?
    #[ORM\Column(length: 12)]
    #[Assert\Regex(pattern: "#([AD]-)?^[0-9]{5}$#", message: "Bitte eine gültige PLZ eintragen z.B. 80399 oder D-80399")]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern: "#^\p{Lu}[\p{L}\s\(\)'-\.]+$#u", message: "Invalid city name")]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Regex(pattern: "#^\p{Lu}[\p{L}\s\(\)'-\.]+$#u", message: "Invalid street name")]
    private ?string $street = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Assert\Regex(pattern: "#^[1-9][\d\sa-zA-Z/\(\)-\.]*$#", message: "Invalid street number")]
    private ?string $number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addressextra = null;

    public function __toString()
    {
        return $this->postalCode." ".$this->city." ".$this->street." ".$this->number." ".$this->addressextra;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getAddressextra(): ?string
    {
        return $this->addressextra;
    }

    public function setAddressextra(?string $addressextra): self
    {
        $this->addressextra = $addressextra;

        return $this;
    }

}
