<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
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
    private $QRcode;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_archived;

    /**
     * @ORM\ManyToOne(targetEntity=PresMedic::class, inversedBy="prescription")
     */
    private $presMedic;

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

    public function getQRcode(): ?string
    {
        return $this->QRcode;
    }

    public function setQRcode(?string $QRcode): self
    {
        $this->QRcode = $QRcode;

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

    public function getPresMedic(): ?PresMedic
    {
        return $this->presMedic;
    }

    public function setPresMedic(?PresMedic $presMedic): self
    {
        $this->presMedic = $presMedic;

        return $this;
    }
}
