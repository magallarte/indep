<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KidRepository")
 */
class Kid
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
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\School", inversedBy="kid")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SchoolClass", inversedBy="kid", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $school_class;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SchoolLevel", inversedBy="kid", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $school_level;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="kid")
     */
    private $parent;

    public function __construct()
    {
        $this->parent = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getSchoolClass(): ?SchoolClass
    {
        return $this->school_class;
    }

    public function setSchoolClass(SchoolClass $school_class): self
    {
        $this->school_class = $school_class;

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

    /**
     * @return Collection|User[]
     */
    public function getParent(): Collection
    {
        return $this->parent;
    }

    public function addParent(User $parent): self
    {
        if (!$this->parent->contains($parent)) {
            $this->parent[] = $parent;
            $parent->addKid($this);
        }

        return $this;
    }

    public function removeParent(User $parent): self
    {
        if ($this->parent->contains($parent)) {
            $this->parent->removeElement($parent);
            $parent->removeKid($this);
        }

        return $this;
    }
}
