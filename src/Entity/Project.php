<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

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
	 * @ORM\Column(type="string", length=255, nullable=true)
	 * @var string
	 */
	private $image;

	/**
	 * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
	 * @var File
	 */
	private $imageFile;

	/**
	 * @ORM\Column(type="datetime")
	 * @var \DateTime
	 */
	private $updatedAt;

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
	 * @return string|null
	 */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

	/**
	 * @param $slug
	 * @return $this
	 */
    public function setSlug($slug)
	{
		$this->slug = $slug;

		return $this;
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

	public function setImageFile(File $image = null)
	{
		$this->imageFile = $image;

		// VERY IMPORTANT:
		// It is required that at least one field changes if you are using Doctrine,
		// otherwise the event listeners won't be called and the file is lost
		if ($image) {
			// if 'updatedAt' is not defined in your entity, use another property
			$this->updatedAt = new \DateTime('now');
		}
	}

	public function getImageFile()
	{
		return $this->imageFile;
	}

	public function setImage($image)
	{
		$this->image = $image;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function setUpdatedAt(\DateTime  $dateTime)
	{
		$this->updatedAt = $dateTime;

		return $this;
	}
}
