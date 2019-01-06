<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Link", inversedBy="pages")
     */
    private $link;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\File", inversedBy="pages")
     */
    private $file;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Section", mappedBy="page")
     */
    private $section;

    public function __construct()
    {
        $this->link = new ArrayCollection();
        $this->file = new ArrayCollection();
        $this->section = new ArrayCollection();
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

    /**
     * @return Collection|Link[]
     */
    public function getLink(): Collection
    {
        return $this->link;
    }

    public function addLink(Link $link): self
    {
        if (!$this->link->contains($link)) {
            $this->link[] = $link;
        }

        return $this;
    }

    public function removeLink(Link $link): self
    {
        if ($this->link->contains($link)) {
            $this->link->removeElement($link);
        }

        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getFile(): Collection
    {
        return $this->file;
    }

    public function addFile(File $file): self
    {
        if (!$this->file->contains($file)) {
            $this->file[] = $file;
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->file->contains($file)) {
            $this->file->removeElement($file);
        }

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(Section $section): self
    {
        if (!$this->section->contains($section)) {
            $this->section[] = $section;
            $section->setPage($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->section->contains($section)) {
            $this->section->removeElement($section);
            // set the owning side to null (unless already changed)
            if ($section->getPage() === $this) {
                $section->setPage(null);
            }
        }

        return $this;
    }
}
