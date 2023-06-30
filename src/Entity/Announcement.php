<?php

namespace App\Entity;

use App\Repository\AnnouncementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnouncementRepository::class)]
class Announcement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Subject = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Message = null;

    // #[ORM\Column(length: 255)]
    // private ?string $Message = null;
    /**
     * @ORM\Column(type="text", length=1000, nullable=true)
     */
    // private ?string $Message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->Date;
    }

    public function setDate(string $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->Subject;
    }

    public function setSubject(?string $Subject): static
    {
        $this->Subject = $Subject;

        return $this;
    }

    // public function getMessage(): ?string
    // {
    //     return $this->Message;
    // }

    // public function setMessage(string $Message): static
    // {
    //     $this->Message = $Message;

    //     return $this;
    // }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }
}
