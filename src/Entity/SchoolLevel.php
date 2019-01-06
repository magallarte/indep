<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolLevelRepository")
 */
class SchoolLevel
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
     * @ORM\OneToOne(targetEntity="App\Entity\SchoolList", mappedBy="school_level", cascade={"persist", "remove"})
     */
    private $schoolList;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Kid", mappedBy="school_level", cascade={"persist", "remove"})
     */
    private $kid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\School", inversedBy="school_level")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\File", inversedBy="school_level")
     */
    private $file;

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

    public function getSchoolList(): ?SchoolList
    {
        return $this->schoolList;
    }

    public function setSchoolList(SchoolList $schoolList): self
    {
        $this->schoolList = $schoolList;

        // set the owning side of the relation if necessary
        if ($this !== $schoolList->getSchoolLevel()) {
            $schoolList->setSchoolLevel($this);
        }

        return $this;
    }

    public function getKid(): ?Kid
    {
        return $this->kid;
    }

    public function setKid(Kid $kid): self
    {
        $this->kid = $kid;

        // set the owning side of the relation if necessary
        if ($this !== $kid->getSchoolLevel()) {
            $kid->setSchoolLevel($this);
        }

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
