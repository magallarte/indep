<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 */
class Document
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\School", mappedBy="document")
     */
    private $school;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SchoolLevel", mappedBy="document")
     */
    private $school_level;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SchoolClass", mappedBy="document")
     */
    private $school_class;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Page")
     */
    private $page;

    public function __construct()
    {
        $this->school = new ArrayCollection();
        $this->school_level = new ArrayCollection();
        $this->school_class = new ArrayCollection();
        $this->page = new ArrayCollection();
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

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
            $school->setDocument($this);
        }

        return $this;
    }

    public function removeSchool(School $school): self
    {
        if ($this->school->contains($school)) {
            $this->school->removeElement($school);
            // set the owning side to null (unless already changed)
            if ($school->getDocument() === $this) {
                $school->setDocument(null);
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
            $schoolLevel->setDocument($this);
        }

        return $this;
    }

    public function removeSchoolLevel(SchoolLevel $schoolLevel): self
    {
        if ($this->school_level->contains($schoolLevel)) {
            $this->school_level->removeElement($schoolLevel);
            // set the owning side to null (unless already changed)
            if ($schoolLevel->getDocument() === $this) {
                $schoolLevel->setDocument(null);
            }
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
            $schoolClass->setDocument($this);
        }

        return $this;
    }

    public function removeSchoolClass(SchoolClass $schoolClass): self
    {
        if ($this->school_class->contains($schoolClass)) {
            $this->school_class->removeElement($schoolClass);
            // set the owning side to null (unless already changed)
            if ($schoolClass->getDocument() === $this) {
                $schoolClass->setDocument(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Page[]
     */
    public function getPage(): Collection
    {
        return $this->page;
    }

    public function addPage(Page $page): self
    {
        if (!$this->page->contains($page)) {
            $this->page[] = $page;
        }

        return $this;
    }

    public function removePage(Page $page): self
    {
        if ($this->page->contains($page)) {
            $this->page->removeElement($page);
        }

        return $this;
    }
}
