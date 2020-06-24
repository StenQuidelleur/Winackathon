<?php

namespace App\Entity;

use App\Repository\PresMedicRepository;
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
     * @ORM\ManyToOne(targetEntity=Medication::class, inversedBy="presMedics")
     */
    private $medication;

    /**
     * @ORM\ManyToOne(targetEntity=Prescription::class, inversedBy="presMedics")
     */
    private $prescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedication(): ?Medication
    {
        return $this->medication;
    }

    public function setMedication(?Medication $medication): self
    {
        $this->medication = $medication;

        return $this;
    }

    public function getPrescription(): ?Prescription
    {
        return $this->prescription;
    }

    public function setPrescription(?Prescription $prescription): self
    {
        $this->prescription = $prescription;

        return $this;
    }
}
