<?php

namespace App\Entity;

use App\Repository\PharmacyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $horaire;

    /**
     * @ORM\OneToMany(targetEntity=PharmMedic::class, mappedBy="pharmacy")
     */
    private $pharmMedics;

    public function __construct()
    {
        $this->pharmMedics = new ArrayCollection();
    }

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
        return $this->horaire;
    }

    public function setHoraire(?string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * @return Collection|PharmMedic[]
     */
    public function getPharmMedics(): Collection
    {
        return $this->pharmMedics;
    }

    public function addPharmMedic(PharmMedic $pharmMedic): self
    {
        if (!$this->pharmMedics->contains($pharmMedic)) {
            $this->pharmMedics[] = $pharmMedic;
            $pharmMedic->setPharmacy($this);
        }

        return $this;
    }

    public function removePharmMedic(PharmMedic $pharmMedic): self
    {
        if ($this->pharmMedics->contains($pharmMedic)) {
            $this->pharmMedics->removeElement($pharmMedic);
            // set the owning side to null (unless already changed)
            if ($pharmMedic->getPharmacy() === $this) {
                $pharmMedic->setPharmacy(null);
            }
        }

        return $this;
    }
}
