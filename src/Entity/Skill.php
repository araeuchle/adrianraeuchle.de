<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Bitte geben Sie einen Projektnamen ein.")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Bitte geben Sie eine Bewertung der Fähigkeit ein.")
     * @Assert\Range(
     *     min=1,
     *     max=100,
     *     notInRangeMessage="Bitte geben Sie eine Bewertung zwischen 1 und 100 ein."
     * )
     */
    private $rating;

	/**
	 * @var string
	 * @ORM\Column(name="color")
	 * @Assert\NotBlank(message="Bitte geben Sie eine eine Farbe ein.")
	 */
    private $color;

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
	 * @return int|null
	 */
    public function getRating(): ?int
    {
        return $this->rating;
    }

	/**
	 * @param int $rating
	 * @return $this
	 */
    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

	/**
	 * @return string
	 */
	public function getColor(): string
	{
		return $this->color;
	}

	/**
	 * @param string $color
	 * @return self
	 */
	public function setColor(string $color): self
	{
		$this->color = $color;

		return $this;
	}
}
