<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @Assert\NotNull
     * 
     */
    private $Degree;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     * 
     */
    private $YearOfPassing;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     * 
     */
    private $percentage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     * 
     */
    private $univercity;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="education")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?string
    {
        return $this->Degree;
    }

    public function setDegree(string $Degree): self
    {
        $this->Degree = $Degree;

        return $this;
    }

    public function getYearOfPassing(): ?string
    {
        return $this->YearOfPassing;
    }

    public function setYearOfPassing(string $YearOfPassing): self
    {
        $this->YearOfPassing = $YearOfPassing;

        return $this;
    }

    public function getPercentage(): ?int
    {
        return $this->percentage;
    }

    public function setPercentage(int $percentage): self
    {
        $this->percentage = $percentage;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
