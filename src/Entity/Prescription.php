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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="prescription")
     */
    private $users;

    public function __construct()
    {
        $this->presMedics = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function setQRcode(?string $qrcode): self
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPrescription($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getPrescription() === $this) {
                $user->setPrescription(null);
            }
        }

        return $this;
    }
}
