<?php

namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
	/**
	 * @var int[]
	 */
	private $skills = [
		'PHP' => 5,
		'Laravel' => 5,
		'Statamic' => 2,
		'Symfony' => 4,
		'Doctrine ORM 2' => 5,
		'Composer' => 5,
		'JavaScript' => 4,
		'TypeScript' => 1,
		'VueJs' => 3,
		'ReactJs' => 2,
		'React-Native' => 2,
		'SCSS' => 3,
		'Webpack' => 2,
		'Git' => 4,
		'SQL' => 3,
		'MySQL' => 3,
		'PostgeSQL' => 2,
		'MongoDB' => 2
	];

	/**
	 * @var array
	 */
	private $jobs  = [];

	public function __construct()
	{
		$this->jobs = [
			[
				'title' => 'Symfony Entwickler',
				'company' => 'macrocom GmbH',
				'startDate' => new \DateTime('01.01.2020'),
				'endDate' => null,
				'description' => 'Wartung und Weiterentwicklung des MHK.net Relaunches mit Pimcore. Entwicklung kleinerer Applikationen mit Symfony 4/5.'
			],
			[
				'title' => 'PHP Entwickler',
				'company' => 'wdv Gesellschaft für Medien & Kommunikation mbH & Co. OHG',
				'startDate' => new \DateTime('01.03.2019'),
				'endDate' => new \DateTime('31.12.2019'),
				'description' => 'Wartung und Weiterentwicklung des WDV Compass. Das Projekt basierte auf dem Zend Framework.'
			],
			[
				'title' => 'Web Developer',
				'company' => 'Blackbits, Inc',
				'startDate' => new \DateTime('07.05.2018'),
				'endDate' => new \DateTime('28.02.2019'),
				'description' => 'Entwicklung und Betreuung verschiedenster Projekte basierend auf Laravel und VueJs.'
			],
			[
				'title' => 'Software Developer',
				'company' => 'CountR GmbH',
				'startDate' => new \DateTime('01.04.2018'),
				'endDate' => new \DateTime('30.04.2018'),
				'description' => 'Entwicklung von Schnittstellen auf Basis von Laravel.'
			],
			[
				'title' => 'Web Developer',
				'company' => 'Funus Online Service GmbH',
				'startDate' => new \DateTime('01.04.2016'),
				'endDate' => new \DateTime('31.03.2018'),
				'description' => 'Entwicklung eines CRM basierend auf Symfony. Weiterentwicklung des Portals Bestattungsvergleich.de'
			],
			[
				'title' => 'Web Developer',
				'company' => 'NETFORMIC GmbH',
				'startDate' => new \DateTime('01.11.2014'),
				'endDate' => new \DateTime('31.03.2016'),
				'description' => 'Weiterentwicklung und Betreuung verschiedenste Online Projekte auf Basis von Shopware und Symfony. '
			],
			[
				'title' => 'Junior Web Developer',
				'company' => 'FLYERALARM  GmbH',
				'startDate' => new \DateTime('01.07.2014'),
				'endDate' => new \DateTime('31.10.2014'),
				'description' => 'Wartung und Weiterentwicklung des Backends des Flyeralarm Shops.'
			],
			[
				'title' => 'Ausbildung Fachinformatiker Anwendungsentwicklung',
				'company' => 'Integrate Marketingpool GmbH',
				'startDate' => new \DateTime('01.09.2011'),
				'endDate' => new \DateTime('30.06.2014'),
				'description' => 'Entwicklung von verschiedensten Projekten auf Basis von Zend Framework und C# für die Veranstaltungsbranche.'
			],
		];
	}

	public function load(ObjectManager $manager)
    {
    	$faker = Factory::create('de');

    	$counter = 0;

    	foreach ($this->jobs as $jobItem) {
    		$job = new Job();
    		$job->setTitle($jobItem['title']);
    		$job->setCompany($jobItem['company']);
    		$job->setStartDate($jobItem['startDate']);
    		$job->setEndDate($jobItem['endDate']);
    		$job->setDescription($jobItem['description']);
    		$job->setSorting($counter);
    		$manager->persist($job);

    		$counter++;
		}

    	foreach ($this->skills as $skillName => $skillRating) {
    		$skill = new Skill();
			$skill->setName($skillName);
			$skill->setRating($skillRating);
			$manager->persist($skill);
		}
        $manager->flush();
    }
}
