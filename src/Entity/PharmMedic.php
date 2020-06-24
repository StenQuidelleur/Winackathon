<?php

namespace App\Entity;

use App\Repository\PharmMedicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=Pharmacy::class, mappedBy="pharmMedic")
     */
    private $pharmacy;

    /**
     * @ORM\OneToMany(targetEntity=Medication::class, mappedBy="pharmMedic")
     */
    private $medication;

    public function __construct()
    {
        $this->pharmacy = new ArrayCollection();
        $this->medication = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Pharmacy[]
     */
    public function getPharmacy(): Collection
    {
        return $this->pharmacy;
    }

    public function addPharmacy(Pharmacy $pharmacy): self
    {
        if (!$this->pharmacy->contains($pharmacy)) {
            $this->pharmacy[] = $pharmacy;
            $pharmacy->setPharmMedic($this);
        }

        return $this;
    }

    public function removePharmacy(Pharmacy $pharmacy): self
    {
        if ($this->pharmacy->contains($pharmacy)) {
            $this->pharmacy->removeElement($pharmacy);
            // set the owning side to null (unless already changed)
            if ($pharmacy->getPharmMedic() === $this) {
                $pharmacy->setPharmMedic(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Medication[]
     */
    public function getMedication(): Collection
    {
        return $this->medication;
    }

    public function addMedication(Medication $medication): self
    {
        if (!$this->medication->contains($medication)) {
            $this->medication[] = $medication;
            $medication->setPharmMedic($this);
        }

        return $this;
    }

    public function removeMedication(Medication $medication): self
    {
        if ($this->medication->contains($medication)) {
            $this->medication->removeElement($medication);
            // set the owning side to null (unless already changed)
            if ($medication->getPharmMedic() === $this) {
                $medication->setPharmMedic(null);
            }
        }

        return $this;
    }
}
