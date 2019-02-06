<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="email")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SchoolList", inversedBy="user")
     */
    private $schoolList;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $uptodate_membership_fee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Image()
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Kid", inversedBy="parent")
     */
    private $kid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type("integer")
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $school_list_position;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membership", inversedBy="user")
     */
    // /**
    //  * @ORM\OneToOne(targetEntity="App\Entity\Membership", inversedBy="user", cascade={"persist", "remove"})
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    private $membership;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Board", inversedBy="user")
     */
    // /**
    //  * @ORM\OneToMany(targetEntity="App\Entity\Board", mappedBy="user")
    //  */
    private $board;

    public function __construct()
    {
        $this->kid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function addRole($role) {
        $this->roles[] = $role;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSchoolList(): ?SchoolList
    {
        return $this->schoolList;
    }

    public function setSchoolList(?SchoolList $schoolList): self
    {
        $this->schoolList = $schoolList;

        return $this;
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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getUptodateMembershipFee(): ?bool
    {
        return $this->uptodate_membership_fee;
    }

    public function setUptodateMembershipFee(bool $uptodate_membership_fee): self
    {
        $this->uptodate_membership_fee = $uptodate_membership_fee;

        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|Kid[]
     */
    public function getKid(): Collection
    {
        return $this->kid;
    }

    public function addKid(Kid $kid): self
    {
        if (!$this->kid->contains($kid)) {
            $this->kid[] = $kid;
        }

        return $this;
    }

    public function removeKid(Kid $kid): self
    {
        if ($this->kid->contains($kid)) {
            $this->kid->removeElement($kid);
        }

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

    public function getSchoolListPosition(): ?int
    {
        return $this->school_list_position;
    }

    public function setSchoolListPosition(?int $school_list_position): self
    {
        $this->school_list_position = $school_list_position;

        return $this;
    }

    public function getMembership(): ?Membership
    {
        return $this->membership;
    }

    public function setMembership(Membership $membership): self
    {
        $this->membership = $membership;

        return $this;
    }

    /**
     * @return Collection|Board[]
     */
    public function getBoard(): Collection
    {
        return $this->board;
    }

    public function addBoard(Board $board): self
    {
        if (!$this->board->contains($board)) {
            $this->board[] = $board;
            $board->setUser($this);
        }

        return $this;
    }

    public function removeBoard(Board $board): self
    {
        if ($this->board->contains($board)) {
            $this->board->removeElement($board);
            // set the owning side to null (unless already changed)
            if ($board->getUser() === $this) {
                $board->setUser(null);
            }
        }

        return $this;
    }
}
