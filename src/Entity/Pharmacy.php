<?php

namespace App\Entity;

use App\Repository\PharmacyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PharmacyRepository::class)
 */
class Pharmacy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Horaire;

    /**
     * @ORM\ManyToOne(targetEntity=PharmMedic::class, inversedBy="pharmacy")
     */
    private $pharmMedic;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->Horaire;
    }

    public function setHoraire(?string $Horaire): self
    {
        $this->Horaire = $Horaire;

        return $this;
    }

    public function getPharmMedic(): ?PharmMedic
    {
        return $this->pharmMedic;
    }

    public function setPharmMedic(?PharmMedic $pharmMedic): self
    {
        $this->pharmMedic = $pharmMedic;

        return $this;
    }
}
