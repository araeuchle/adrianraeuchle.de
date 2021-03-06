<?php

namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\Project;
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
		[
			'name' => 'Composer',
			'rating' => 100,
			'category' => 'Backend'
		],
		[
			'name' => 'Doctrine ORM 2',
			'rating' => 95,
			'category' => 'Database'
		],
		[
			'name' => 'Eloquent ORM',
			'rating' => 100,
			'category' => 'Database'
		],
		[
			'name' => 'Git',
			'rating' => 90,
			'category' => 'Backend'
		],
		[
			'name' => 'JavaScript',
			'rating' => 70,
			'category' => 'Frontend'
		],
		[
			'name' => 'Laravel',
			'rating' => 100,
			'category' => 'Backend'
		],
		[
			'name' => 'MongoDB',
			'rating' => 20,
			'category' => 'Database'
		],
		[
			'name' => 'MySQL',
			'rating' => 90,
			'category' => 'Database'
		],
		[
			'name' => 'PHP',
			'rating' => 100,
			'category' => 'Backend'
		],
		[
			'name' => 'PostgreSQL',
			'rating' => 30,
			'category' => 'Database'
		],
		[
			'name' => 'React-Native',
			'rating' => 25,
			'category' => 'Frontend'
		],
		[
			'name' => 'ReactJS',
			'rating' => 25,
			'category' => 'Frontend'
		],
		[
			'name' => 'SCSS',
			'rating' => 70,
			'category' => 'Frontend'
		],
		[
			'name' => 'SQL',
			'rating' => 70,
			'category' => 'Database'
		],
		[
			'name' => 'Statamic CMS',
			'rating' => 80,
			'category' => 'Backend'
		],
		[
			'name' => 'Symfony',
			'rating' => 100,
			'category' => 'Backend'
		],
		[
			'name' => 'TypeScript',
			'rating' => 30,
			'category' => 'Frontend'
		],
		[
			'name' => 'VueJS',
			'rating' => 60,
			'category' => 'Frontend'
		],
		[
			'name' => 'WebPack',
			'rating' => 40,
			'category' => 'Frontend'
		],
		[
			'name' => 'Vagrant',
			'rating' => 70,
			'category' => 'DevOps'
		],
		[
			'name' => 'Docker',
			'rating' => 20,
			'category' => 'DevOps'
		],
		[
			'name' => 'BashScripting',
			'rating' => 30,
			'category' => 'DevOps'
		],
		[
			'name' => 'Linux',
			'rating' => 40,
			'category' => 'DevOps'
		],
		[
			'name' => 'Apache',
			'rating' => 60,
			'category' => 'DevOps'
		],
		[
			'name' => 'Nginx',
			'rating' => 40,
			'category' => 'DevOps'
		],
		[
			'name' => 'Kubernetes',
			'rating' => 10,
			'category' => 'DevOps'
		]
	];

	/**
	 * @var array
	 */
	private $jobs = [];

	private $projects = [
		[
			'name' => 'JSON Data Viewer',
			'category' => 'PHP / Laravel / VueJS',
			'description' => 'Um Daten für Affiliate Seiten aufzubereiten, benötigte ich ein Tool, mit dem sich schnell und einfach eine große Menge an JSON Daten einsehen und bearbeiten lässt.
Die Daten, die ich bekomme, sind leider nicht immer in dem Zustand, wie sie benötigt werden. Dadurch ist die Idee des JSON Data Viewers entstanden.

Im Viewer lässt sich eine JSON Datei importieren. Der Viewer erkennt automatisch die Menge an Einträgen und generiert pro Eintrag ein entsprechendes Formular mit den Datensätzen. Diese Datensätze können dann bequem mittels VueJS bearbeitet werden. Die Daten lassen sich anschließend wieder in CSV und JSON exportieren.

Das Projekt wurde mittels Laravel 8, VueJS, VueEx und Bootstrap umgesetzt.',
			'lessonsLearned' => 'Bauen einer SPA in VueJs.<br />
Umgang mit dem VueEx Store.',
			'githubLink' => 'https://github.com/araeuchle/json-data-viewer',
		],
		[
			'name' => 'adrianraeuchle.de',
			'category' => 'PHP / Symfony',
			'description' => 'In diesem Projekt ging es um den Aufbau meiner eigenen persönlichen Website. Ich wollte eine Webseite mit meinem Lebenslauf, so wie die Möglichkeit meine Projekte zu präsentieren. Umgesetzt habe ich die Seite mit Symfony und TailwindCSS.
<br />
<br />
<strong>Als weitere Features sollen folgen:</strong>

<ul>
<li>Blog</li>
<li>RSS-Feed</li>
<li>eine Video Academy zum Thema PHP Entwicklung</li>
</ul>',
			'lessonsLearned' => 'Vertiefung meines Symfony Wissens.<br />
Wie man TailwindCSS in Symfony einsetzt.',
			'githubLink' => 'https://github.com/araeuchle/adrianraeuchle.de',
		]
	];

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

    	foreach ($this->skills as $skillItem) {
    		$skill = new Skill();
    		$skill->setName($skillItem['name']);
    		$skill->setRating($skillItem['rating']);
    		$skill->setColor($faker->hexColor);
    		$skill->setCategory($skillItem['category']);

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

		foreach ($this->projects as $projectItem) {
			$project = new Project();
			$project->setName($projectItem['name']);
			$project->setCategory($projectItem['category']);
			$project->setDescription($projectItem['description']);
			$project->setLessonsLearned($projectItem['lessonsLearned']);
			$project->setGithubLink($projectItem['githubLink']);

			$manager->persist($project);
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
