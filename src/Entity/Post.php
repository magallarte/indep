<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hashtag1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hashtag2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hashtag3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hashtag4;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Page")
     */
    private $page;

    public function __construct()
    {
        $this->page = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
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

    public function getHashtag1(): ?string
    {
        return $this->hashtag1;
    }

    public function setHashtag1(?string $hashtag1): self
    {
        $this->hashtag1 = $hashtag1;

        return $this;
    }

    public function getHashtag2(): ?string
    {
        return $this->hashtag2;
    }

    public function setHashtag2(?string $hashtag2): self
    {
        $this->hashtag2 = $hashtag2;

        return $this;
    }

    public function getHashtag3(): ?string
    {
        return $this->hashtag3;
    }

    public function setHashtag3(?string $hashtag3): self
    {
        $this->hashtag3 = $hashtag3;

        return $this;
    }

    public function getHashtag4(): ?string
    {
        return $this->hashtag4;
    }

    public function setHashtag4(?string $hashtag4): self
    {
        $this->hashtag4 = $hashtag4;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
