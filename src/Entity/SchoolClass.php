<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolClassRepository")
 */
class SchoolClass
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
     * @ORM\OneToOne(targetEntity="App\Entity\Kid", mappedBy="school_class", cascade={"persist", "remove"})
     */
    private $kid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\School", inversedBy="school_class")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\File", inversedBy="school_class")
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

    public function getKid(): ?Kid
    {
        return $this->kid;
    }

    public function setKid(Kid $kid): self
    {
        $this->kid = $kid;

        // set the owning side of the relation if necessary
        if ($this !== $kid->getSchoolClass()) {
            $kid->setSchoolClass($this);
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
