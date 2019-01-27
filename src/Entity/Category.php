<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="categoryCollection")
     */
    private $postCollection;

    public function __construct()
    {
        $this->postCollection = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Category
     */
    public function setName($name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Category
     */
    public function setDescription($description): Category
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return Category
     */
    public function setSlug($slug): Category
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return Category
     */
    public function setCreatedAt($createdAt): Category
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return Category
     */
    public function setUpdatedAt($updatedAt): Category
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return ArrayCollection|Post[]
     */
    public function getPostCollection()
    {
        return $this->postCollection;
    }

    /**
     * @param mixed $postCollection
     * @return Category
     */
    public function setPostCollection(Post $postCollection): Category
    {
        if ($this->postCollection->contains($postCollection)) {
        return $this;
        }

        $this->postCollection = $postCollection;
        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }


}
