<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoardRepository")
 */
class Board
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mission;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="board")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(?string $mission): self
    {
        $this->mission = $mission;

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
}
