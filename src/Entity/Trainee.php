<?php

namespace App\Entity;

use App\Repository\TraineeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TraineeRepository::class)]
class Trainee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CID = null;

    #[ORM\Column(length: 255)]
    private ?string $Rating = null;

    #[ORM\Column(length: 255)]
    private ?string $Comment = null;

    
    // ID --------------------------------
    public function getId(): ?int
    {
        return $this->id;
    }

    // CID --------------------------------
    public function getCID(): ?string
    {
        return $this->CID;
    }

    public function setCID(string $CID): static
    {
        $this->CID = $CID;

        return $this;
    }

    // Rating --------------------------------
    public function getRating(): ?string
    {
        return $this->Rating;
    }

    public function setRating(string $Rating): static
    {
        $this->Rating = $Rating;

        return $this;
    }

    // Comments --------------------------------
    public function getComment(): ?string
    {
        return $this->Comment;
    }

    public function setComment(string $Comment): static
    {
        $this->Comment = $Comment;

        return $this;
    }
}
