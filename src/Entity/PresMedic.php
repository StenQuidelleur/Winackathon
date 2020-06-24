<?php

namespace App\Entity;

use App\Repository\PresMedicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresMedicRepository::class)
 */
class PresMedic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Medication::class, mappedBy="presMedic")
     */
    private $Medication;

    /**
     * @ORM\OneToMany(targetEntity=Prescription::class, mappedBy="presMedic")
     */
    private $prescription;

    public function __construct()
    {
        $this->Medication = new ArrayCollection();
        $this->prescription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Medication[]
     */
    public function getMedication(): Collection
    {
        return $this->Medication;
    }

    public function addMedication(Medication $medication): self
    {
        if (!$this->Medication->contains($medication)) {
            $this->Medication[] = $medication;
            $medication->setPresMedic($this);
        }

        return $this;
    }

    public function removeMedication(Medication $medication): self
    {
        if ($this->Medication->contains($medication)) {
            $this->Medication->removeElement($medication);
            // set the owning side to null (unless already changed)
            if ($medication->getPresMedic() === $this) {
                $medication->setPresMedic(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Prescription[]
     */
    public function getPrescription(): Collection
    {
        return $this->prescription;
    }

    public function addPrescription(Prescription $prescription): self
    {
        if (!$this->prescription->contains($prescription)) {
            $this->prescription[] = $prescription;
            $prescription->setPresMedic($this);
        }

        return $this;
    }

    public function removePrescription(Prescription $prescription): self
    {
        if ($this->prescription->contains($prescription)) {
            $this->prescription->removeElement($prescription);
            // set the owning side to null (unless already changed)
            if ($prescription->getPresMedic() === $this) {
                $prescription->setPresMedic(null);
            }
        }

        return $this;
    }
}
