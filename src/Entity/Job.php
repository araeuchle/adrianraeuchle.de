<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Carbon\Carbon;
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
	 * @return int|null
	 */
    public function getId(): ?int
    {
        return $this->id;
    }

	/**
	 * @return string|null
	 */
    public function getTitle(): ?string
    {
        return $this->title;
    }

	/**
	 * @param string|null $title
	 * @return $this
	 */
    public function setTitle(string $title = null): self
    {
        $this->title = $title;

        return $this;
    }

	/**
	 * @return \DateTimeInterface|null
	 */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

	/**
	 * @param \DateTimeInterface|null $startDate
	 * @return $this
	 */
    public function setStartDate(\DateTimeInterface $startDate = null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

	/**
	 * @return \DateTimeInterface|null
	 */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

	/**
	 * @param \DateTimeInterface|null $endDate
	 * @return $this
	 */
    public function setEndDate(?\DateTimeInterface $endDate = null): self
    {
        $this->endDate = $endDate;

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
	 * @param string|null $description
	 * @return $this
	 */
    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

	/**
	 * @return string|null
	 */
    public function getCompany(): ?string
    {
        return $this->company;
    }

	/**
	 * @param string|null $company
	 * @return $this
	 */
    public function setCompany(string $company = null): self
    {
        $this->company = $company;

        return $this;
    }

	/**
	 * @return string
	 */
    public function getDifference()
	{
		$startDate = $this->createStartDate();
		$endDate = $this->createEndDate();
		$diff = $startDate->diff($endDate);
		$years = $this->getYearsFromDiff($diff);

		$months = $diff->m + 1;

		if ($months === 12) {
			$years += 1;
			$months = null;
		}

		return trim($years . ' '. $this->getYearString($years) . ' ' . $months  . ' '. $this->getMonthString($months));
	}

	/**
	 * @return Carbon
	 */
	private function createEndDate()
	{
		if ($this->endDate === null) {
			return Carbon::now();
		} else {
			return Carbon::instance($this->endDate);
		}
	}

	/**
	 * @return Carbon
	 */
	private function createStartDate()
	{
		return Carbon::instance($this->startDate);
	}

	/**
	 * @param $diff
	 * @return ?int
	 */
	private function getYearsFromDiff($diff)
	{
		$years = $diff->y;

		if ($years === 0) {
			$years = null;
		}

		return $years;
	}

	/**
	 * @param $years
	 * @return string
	 */
	private function getYearString($years)
	{
		switch($years) {
			case 1:
				return 'Jahr';
			case 0:
			case null:
			case '':
				return '';
			default:
				return 'Jahre';
		}
	}

	/**
	 * @param $months
	 * @return string
	 */
	private function getMonthString($months)
	{
		switch($months) {
			case 1:
				return 'Monat';
			case 0:
			case null:
			case '':
				return '';
			default:
				return 'Monate';
		}
	}
}
