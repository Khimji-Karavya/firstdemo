<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EducationRepository::class)
 */
class Education
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $degree;

    /**
     * @ORM\Column(type="string")
     */
    private $yearOfPassing;

    /**
     * @ORM\Column(type="integer")
     */
    private $persantage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $univercity;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="education", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getYearOfPassing(): ?string
    {
        return $this->yearOfPassing;
    }

    public function setYearOfPassing(string $yearOfPassing): self
    {
        $this->yearOfPassing = $yearOfPassing;

        return $this;
    }

    public function getPersantage(): ?int
    {
        return $this->persantage;
    }

    public function setPersantage(int $persantage): self
    {
        $this->persantage = $persantage;

        return $this;
    }

    public function getUnivercity(): ?string
    {
        return $this->univercity;
    }

    public function setUnivercity(string $univercity): self
    {
        $this->univercity = $univercity;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
