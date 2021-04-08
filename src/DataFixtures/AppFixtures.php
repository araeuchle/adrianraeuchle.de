<?php

namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\Skill;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
	/**
	 * @var array
	 */
	private $skills = [
		'Composer' => 100,
		'Doctrine ORM 2' => 95,
		'Eloquent ORM' => 100,
		'Git' => 90,
		'JavaScript' => 70,
		'Laravel' => 100,
		'MongoDB' => 20,
		'MySQL' => 80,
		'PHP' => 100,
		'PostgreSQL' => 30,
		'React-Native' => 25,
		'ReactJS' => 25,
		'SCSS' => 70,
		'SQL' => 80,
		'Statamic' => 80,
		'Symfony' => 100,
		'TypeScript' => 10,
		'VueJs' => 60,
		'WebPack' => 30
	];

	/**
	 * @var array
	 */
	private $jobs = [];

	/**
	 * @var UserPasswordEncoderInterface
	 */
	private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;

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

    	foreach ($this->skills as $name => $rating) {
    		$skill = new Skill();
    		$skill->setName($name);
    		$skill->setRating($rating);
    		$skill->setColor($faker->hexColor);

    		$manager->persist($skill);
		}

    	$manager->flush();

		foreach ($this->jobs as $jobItem) {
			$job = new Job();
			$job->setTitle($jobItem['title']);
			$job->setCompany($jobItem['company']);
			$job->setStartDate($jobItem['startDate']);
			$job->setEndDate($jobItem['endDate']);
			$job->setDescription($jobItem['description']);
			$manager->persist($job);
		}

		$manager->flush();

		$user = new User();
		$user->setName('araeuchle');
		$user->setRoles(['ROLE_ADMIN']);
		$user->setPassword($this->passwordEncoder->encodePassword($user, $_ENV['ADMIN_PW']));

		$manager->persist($user);
		$manager->flush();
    }
}
