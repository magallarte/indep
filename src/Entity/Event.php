<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endtime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture4;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $contact;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SchoolLevel")
     */
    private $school_level;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\School")
     */
    private $school;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SchoolClass")
     */
    private $school_class;

    public function __construct()
    {
        $this->school_level = new ArrayCollection();
        $this->school = new ArrayCollection();
        $this->school_class = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStartime(): ?\DateTimeInterface
    {
        return $this->startime;
    }

    public function setStartime(?\DateTimeInterface $startime): self
    {
        $this->startime = $startime;

        return $this;
    }

    public function getEndtime(): ?\DateTimeInterface
    {
        return $this->endtime;
    }

    public function setEndtime(?\DateTimeInterface $endtime): self
    {
        $this->endtime = $endtime;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getPicture1(): ?string
    {
        return $this->picture1;
    }

    public function setPicture1(?string $picture1): self
    {
        $this->picture1 = $picture1;

        return $this;
    }

    public function getPicture2(): ?string
    {
        return $this->picture2;
    }

    public function setPicture2(string $picture2): self
    {
        $this->picture2 = $picture2;

        return $this;
    }

    public function getPicture3(): ?string
    {
        return $this->picture3;
    }

    public function setPicture3(?string $picture3): self
    {
        $this->picture3 = $picture3;

        return $this;
    }

    public function getPicture4(): ?string
    {
        return $this->picture4;
    }

    public function setPicture4(?string $picture4): self
    {
        $this->picture4 = $picture4;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContact(): ?User
    {
        return $this->contact;
    }

    public function setContact(?User $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection|SchoolLevel[]
     */
    public function getSchoolLevel(): Collection
    {
        return $this->school_level;
    }

    public function addSchoolLevel(SchoolLevel $schoolLevel): self
    {
        if (!$this->school_level->contains($schoolLevel)) {
            $this->school_level[] = $schoolLevel;
        }

        return $this;
    }

    public function removeSchoolLevel(SchoolLevel $schoolLevel): self
    {
        if ($this->school_level->contains($schoolLevel)) {
            $this->school_level->removeElement($schoolLevel);
        }

        return $this;
    }

    /**
     * @return Collection|School[]
     */
    public function getSchool(): Collection
    {
        return $this->school;
    }

    public function addSchool(School $school): self
    {
        if (!$this->school->contains($school)) {
            $this->school[] = $school;
        }

        return $this;
    }

    public function removeSchool(School $school): self
    {
        if ($this->school->contains($school)) {
            $this->school->removeElement($school);
        }

        return $this;
    }

    /**
     * @return Collection|SchoolClass[]
     */
    public function getSchoolClass(): Collection
    {
        return $this->school_class;
    }

    public function addSchoolClass(SchoolClass $schoolClass): self
    {
        if (!$this->school_class->contains($schoolClass)) {
            $this->school_class[] = $schoolClass;
        }

        return $this;
    }

    public function removeSchoolClass(SchoolClass $schoolClass): self
    {
        if ($this->school_class->contains($schoolClass)) {
            $this->school_class->removeElement($schoolClass);
        }

        return $this;
    }
}
