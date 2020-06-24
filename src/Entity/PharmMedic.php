<?php

namespace App\Entity;

use App\Repository\PharmMedicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PharmMedicRepository::class)
 */
class PharmMedic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pharmacy::class, inversedBy="pharmMedics")
     */
    private $pharmacy;

    /**
     * @ORM\ManyToOne(targetEntity=Medication::class, inversedBy="pharmMedics")
     */
    private $medication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPharmacy(): ?Pharmacy
    {
        return $this->pharmacy;
    }

    public function setPharmacy(?Pharmacy $pharmacy): self
    {
        $this->pharmacy = $pharmacy;

        return $this;
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
}
