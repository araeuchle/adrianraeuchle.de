<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Bitte geben Sie den Titel ein.")
     */
    private $title;

    /**
     * @ORM\Column(type="date")
	 * @Assert\NotBlank(message="Bitte geben Sie ein Startdatum ein.")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\Column(type="text")
	 * @Assert\NotBlank(message="Bitte geben Sie eine Beschreibung ein.")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Bitte geben Sie eine Firma ein.")
     */
    private $company;

    /**
     * @ORM\Column(type="integer")
	 * @Assert\NotBlank(message="Bitte geben Sie eine Sortierung ein.")
     */
    private $sorting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title = null): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate = null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate = null): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company = null): self
    {
        $this->company = $company;

        return $this;
    }

    public function getSorting(): ?int
    {
        return $this->sorting;
    }

    public function setSorting(int $sorting = null): self
    {
        $this->sorting = $sorting;

        return $this;
    }

    public function getDifference()
	{
		$endDate = $this->endDate;

		if ($this->endDate === null) {
			$endDate = new \DateTime();
		}

		$diff = $this->startDate->diff($endDate);
		$months = $diff->m + 1;
		$years = $diff->y;

		if ($years === 0) {
			$years = null;
		}

		if ($months === 12) {
			$years += 1;
			$months = null;
		}

		if ($years === 1) {
			$yearString = 'Jahr';
		} else if ($years > 1) {
			$yearString = 'Jahre';
		} else {
			$yearString =  '';
		}

		if ($months === 1) {
			$monthString = 'Monat';
		} elseif($months  > 1) {
			$monthString = 'Monate';
		} else {
			$monthString = '';
		}

		return trim($years . ' '. $yearString . ' ' . $months  . ' '. $monthString);
	}
}
