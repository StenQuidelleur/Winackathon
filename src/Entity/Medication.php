<?php

namespace App\Entity;

use App\Repository\MedicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicationRepository::class)
 */
class Medication
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
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity=PharmMedic::class, mappedBy="medication")
     */
    private $pharmMedics;

    /**
     * @ORM\OneToMany(targetEntity=PresMedic::class, mappedBy="medication")
     */
    private $presMedics;

    public function __construct()
    {
        $this->pharmMedics = new ArrayCollection();
        $this->presMedics = new ArrayCollection();
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

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

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
            $pharmMedic->setMedication($this);
        }

        return $this;
    }

    public function removePharmMedic(PharmMedic $pharmMedic): self
    {
        if ($this->pharmMedics->contains($pharmMedic)) {
            $this->pharmMedics->removeElement($pharmMedic);
            // set the owning side to null (unless already changed)
            if ($pharmMedic->getMedication() === $this) {
                $pharmMedic->setMedication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PresMedic[]
     */
    public function getPresMedics(): Collection
    {
        return $this->presMedics;
    }

    public function addPresMedic(PresMedic $presMedic): self
    {
        if (!$this->presMedics->contains($presMedic)) {
            $this->presMedics[] = $presMedic;
            $presMedic->setMedication($this);
        }

        return $this;
    }

    public function removePresMedic(PresMedic $presMedic): self
    {
        if ($this->presMedics->contains($presMedic)) {
            $this->presMedics->removeElement($presMedic);
            // set the owning side to null (unless already changed)
            if ($presMedic->getMedication() === $this) {
                $presMedic->setMedication(null);
            }
        }

        return $this;
    }
}
