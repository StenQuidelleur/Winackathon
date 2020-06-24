<?php

namespace App\Entity;

use App\Repository\MedicationRepository;
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
     * @ORM\ManyToOne(targetEntity=PresMedic::class, inversedBy="Medication")
     */
    private $presMedic;

    /**
     * @ORM\ManyToOne(targetEntity=PharmMedic::class, inversedBy="medication")
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

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPresMedic(): ?PresMedic
    {
        return $this->presMedic;
    }

    public function setPresMedic(?PresMedic $presMedic): self
    {
        $this->presMedic = $presMedic;

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
