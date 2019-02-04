<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolListRepository")
 */
class SchoolList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="schoolList")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\School", inversedBy="schoolList", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $available_seats;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $elected_seats;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SchoolLevel", inversedBy="schoolList", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $school_level;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|user[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(user $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setSchoolList($this);
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getSchoolList() === $this) {
                $user->setSchoolList(null);
            }
        }

        return $this;
    }

    public function getSchool(): ?school
    {
        return $this->school;
    }

    public function setSchool(school $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getAvailableSeats(): ?int
    {
        return $this->available_seats;
    }

    public function setAvailableSeats(?int $available_seats): self
    {
        $this->available_seats = $available_seats;

        return $this;
    }

    public function getElectedSeats(): ?int
    {
        return $this->elected_seats;
    }

    public function setElectedSeats(?int $elected_seats): self
    {
        $this->elected_seats = $elected_seats;

        return $this;
    }

    public function getSchoolLevel(): ?SchoolLevel
    {
        return $this->school_level;
    }

    public function setSchoolLevel(SchoolLevel $school_level): self
    {
        $this->school_level = $school_level;

        return $this;
    }
}
