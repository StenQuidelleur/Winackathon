<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrescriptionRepository::class)
 */
class Prescription
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
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qrcode;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_archived;

    /**
     * @ORM\OneToMany(targetEntity=PresMedic::class, mappedBy="prescription")
     */
    private $presMedics;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="prescriptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $medications;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     */
    private $security_Social_Number;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getQrcode(): ?string
    {
        return $this->qrcode;
    }

    public function setQrcode(?string $qrcode): self
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    public function getIsArchived(): ?bool
    {
        return $this->is_archived;
    }

    public function setIsArchived(bool $is_archived): self
    {
        $this->is_archived = $is_archived;

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
            $presMedic->setPrescription($this);
        }

        return $this;
    }

    public function removePresMedic(PresMedic $presMedic): self
    {
        if ($this->presMedics->contains($presMedic)) {
            $this->presMedics->removeElement($presMedic);
            // set the owning side to null (unless already changed)
            if ($presMedic->getPrescription() === $this) {
                $presMedic->setPrescription(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMedications(): ?string
    {
        return $this->medications;
    }

    public function setMedications(string $medications): self
    {
        $this->medications = $medications;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getSecuritySocialNumber(): ?int
    {
        return $this->security_Social_Number;
    }

    public function setSecuritySocialNumber(int $security_Social_Number): self
    {
        $this->security_Social_Number = $security_Social_Number;

        return $this;
    }
}
