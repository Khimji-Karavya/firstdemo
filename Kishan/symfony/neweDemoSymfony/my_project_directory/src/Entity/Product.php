<?php

namespace App\Entity;


use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex( pattern="/^[a-zA-Z_ ]+$/")
     * @Assert\NotNull
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     *@Assert\Type(type="integer")
     * @Assert\NotNull
     * 
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex( pattern="/^[a-zA-Z_ ]+$/")
     * @Assert\NotNull
     * 
     */
    private $discription;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex( pattern="/^[a-zA-Z_ ]+$/")
     * @Assert\NotNull
     * 
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=category::class)
     * @Assert\NotNull( 
     *      message="Please select category")
     * 
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull
     */
    private $date;

     /**
     * @ORM\Column(type="string")
     * @Assert\NotNull( 
     *      message="Please select state")
     * 
     */
    private $state;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): self
    {
        $this->discription = $discription;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getState(): ? string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }
}
