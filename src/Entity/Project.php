<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
    private $name;

	/**
	 * @var string
	 * @ORM\Column(name="category", type="string")
	 */
    private $category;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $lessonsLearned;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $githubLink;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

	/**
	 * @return string
	 */
	public function getCategory(): string
	{
		return $this->category;
	}

	/**
	 * @param string $category
	 */
	public function setCategory(string $category): void
	{
		$this->category = $category;
	}

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLessonsLearned(): ?string
    {
        return $this->lessonsLearned;
    }

    /**
     * @param string $lessonsLearned
     * @return $this
     */
    public function setLessonsLearned(string $lessonsLearned): self
    {
        $this->lessonsLearned = $lessonsLearned;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGithubLink(): ?string
    {
        return $this->githubLink;
    }

    /**
     * @param string $githubLink
     * @return $this
     */
    public function setGithubLink(string $githubLink): self
    {
        $this->githubLink = $githubLink;

        return $this;
    }

    public function getSmallImagePath()
	{
		return sprintf('/build/images/projectImages/%s_small.png', $this->name);
	}

	public function getBigImagePath()
	{
		return sprintf('/build/images/projectImages/%s_big.png', $this->name);
	}
}
