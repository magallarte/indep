<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 */
class School
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $director_gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director_email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $director_tel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\kid", mappedBy="school")
     */
    private $kid;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SchoolList", mappedBy="school", cascade={"persist", "remove"})
     */
    private $schoolList;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SchoolClass", mappedBy="school")
     */
    private $school_class;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SchoolLevel", mappedBy="school")
     */
    private $school_level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\File", inversedBy="school")
     */
    private $file;

    public function __construct()
    {
        $this->kid = new ArrayCollection();
        $this->school_class = new ArrayCollection();
        $this->school_level = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(?int $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDirectorGender(): ?string
    {
        return $this->director_gender;
    }

    public function setDirectorGender(?string $director_gender): self
    {
        $this->director_gender = $director_gender;

        return $this;
    }

    public function getDirectorName(): ?string
    {
        return $this->director_name;
    }

    public function setDirectorName(?string $director_name): self
    {
        $this->director_name = $director_name;

        return $this;
    }

    public function getDirectorEmail(): ?string
    {
        return $this->director_email;
    }

    public function setDirectorEmail(?string $director_email): self
    {
        $this->director_email = $director_email;

        return $this;
    }

    public function getDirectorTel(): ?string
    {
        return $this->director_tel;
    }

    public function setDirectorTel(?string $director_tel): self
    {
        $this->director_tel = $director_tel;

        return $this;
    }

    /**
     * @return Collection|kid[]
     */
    public function getKid(): Collection
    {
        return $this->kid;
    }

    public function addKid(kid $kid): self
    {
        if (!$this->kid->contains($kid)) {
            $this->kid[] = $kid;
            $kid->setSchool($this);
        }

        return $this;
    }

    public function removeKid(kid $kid): self
    {
        if ($this->kid->contains($kid)) {
            $this->kid->removeElement($kid);
            // set the owning side to null (unless already changed)
            if ($kid->getSchool() === $this) {
                $kid->setSchool(null);
            }
        }

        return $this;
    }

    public function getSchoolList(): ?SchoolList
    {
        return $this->schoolList;
    }

    public function setSchoolList(SchoolList $schoolList): self
    {
        $this->schoolList = $schoolList;

        // set the owning side of the relation if necessary
        if ($this !== $schoolList->getSchool()) {
            $schoolList->setSchool($this);
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
            $schoolClass->setSchool($this);
        }

        return $this;
    }

    public function removeSchoolClass(SchoolClass $schoolClass): self
    {
        if ($this->school_class->contains($schoolClass)) {
            $this->school_class->removeElement($schoolClass);
            // set the owning side to null (unless already changed)
            if ($schoolClass->getSchool() === $this) {
                $schoolClass->setSchool(null);
            }
        }

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
            $schoolLevel->setSchool($this);
        }

        return $this;
    }

    public function removeSchoolLevel(SchoolLevel $schoolLevel): self
    {
        if ($this->school_level->contains($schoolLevel)) {
            $this->school_level->removeElement($schoolLevel);
            // set the owning side to null (unless already changed)
            if ($schoolLevel->getSchool() === $this) {
                $schoolLevel->setSchool(null);
            }
        }

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): self
    {
        $this->file = $file;

        return $this;
    }
}
