<?php

namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\Project;
use App\Entity\Skill;
use Cocur\Slugify\Slugify;
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

	/**
	 * @var array
	 */
	private $projects = [];

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

		$slugify = new Slugify();
		$slugify->activateRuleSet('german');

		$this->projects = [
			[
				'name' => 'Stundenplaner',
				'slug' => $slugify->slugify('Stundenplaner'),
				'description' => '
					Das Projekt wurde entwickelt um die Zeiten der Mitarbeiter des Fortservice Peppler zu erfassen. <br />
					Hier ging es darum eine möglichst einfache Übersicht zu gestalten, die aber dennoch ansprechend aussieht. 
					Von der Funktionalität her bietet das Projekt eine Zeiterfassung, Urlaubstag Erfassung, Krankheitstag Erfassung, sowie einen Monats- und Jahresreporting. <br />
					<br />
					Das Projekt wurde auf Basis von Laravel 6 umgesetzt. 
				',
				'lessonsLearned' => '
					Wie man einen Kalender in PHP generiert. <br />
					Den Unterschied zwischen dem gregorianischen und julianischem Kalender. <br />
					Wie man Daten für ein Reporting effizient kummuliert. 
				',
				'githubLink' => 'https://github.com/araeuchle/stundenplaner-laravel'
			],
			[
				'name' => 'Laravel Make Service (Open Source)',
				'slug' => $slugify->slugify('Laravel Make Service'),
				'description' => '
					Ein kleines Package, welches ich für die Laravel Community geschrieben habe. <br />
					Funktionalität lager ich gerne in einem Service aus, anstelle diese direkt in einem Controller zu schreiben.
					Da es noch kein Paket gab, welches mir die Möglichkeit geboten hat Services über das Artisan Command Line Tool zu generieren, habe ich hierraus ein eigenes Paket gebaut. 
				',
				'lessonsLearned' => '
					Wie man Open Source Projekte für Laravel baut. <br />
					Wie man das Artisan Command Line Tool erweitert.
				',
				'githubLink' => 'https://github.com/araeuchle/laravel-make-service'
			],
			[
				'name' => 'Laravel SEO Redirect Map (Open Source)',
				'slug' => $slugify->slugify('Laravel SEO Redirect Map'),
				'description' => '
					Nach dem ich mit dem Service Maker ein erstes Paket programmiert habe, wollte ich unbedingt noch ein weiteres entwickeln. <br />
					In einem anderen Projekt hatten wir die Problematik, dass wir Seiten hatten, wo sich teilweise der Link geändert hat, wenn man den Namen der Seite geändert hat. 
					Dies hat dazu geführt, dass wir schlagartig unser SEO Ranking verloren haben, welches wir die ganze Zeit für die Seite gesammelt haben. <br />
					Um dies zu verhindern habe ich ein kleines Paket gebaut, welches auf diese Änderungen reagiert und einen Eintrag in eine Seo Mapping Tabelle erstellt. 
					Über eine Middleware wird dann geprüft, ob sich die URL geändert hat und ob ein Eintrag in der Mapping Tabelle vorhanden ist. Ist dies der Fall, so wird ein 301 oder ein 307 
					Redirect auf die neue URL gesendet. Somit konnten wir sicherstellen, das unsere Rankings nicht mehr verloren gehen. 
				',
				'lessonsLearned' => '
					Vertiefung des Wissens über Open Source Projekte. <br />
					Unterschiede zwischen einem 301 und einem 307 Redirect. 
				',
				'githubLink' => 'https://github.com/araeuchle/laravel-seo-redirect-map'
			],
			[
				'name' => 'JSON Data Viewer',
				'slug' => $slugify->slugify('JSON Data Viewer'),
				'description' => '
					Im Zuge der Affiliate Projekte wurde ein Programm benötigt, mit dem sich schnell und einfach eine große Menge an JSON Daten einsichten und bearbeiten lässt. <br />
					Die Daten, die wir bekommen, sind leider nicht immer in dem Zustand wie sie benötigen. Dadurch ist die Idee des JSON Data Viewers entstanden.  
					Im Viewer lässt sich ein JSON Array importieren, der dann daraus automatisiert ein Formular geniert. Dieses Formular enthält dann die Daten des aktuellen Eintrags.
					Ist ein Eintrag unwichtig, kann er einfach gelöscht werden. Alternativ lässt er sich auch bearbeiten. Ist man mit dem Bearbeiten der Daten fertig, so lassen sie sich 
					in JSON und CSV Format exportieren. <br />
					<br />
					Das Projekt wurde mittels Laravel 8, VueJS, VueEx und Bootstrap umgesetzt. 
				',
				'lessonsLearned' => '
					Bauen einer SPA in VueJs.<br />
					Umgang mit dem VueEx Store. 
				',
				'githubLink' => 'https://github.com/araeuchle/json-data-viewer'
			],
			[
				'name' => 'adrianraeuchle.de',
				'slug' => $slugify->slugify('adrianraeuchle.de'),
				'description' => '
					Jeder braucht eine Website. Gut das stimmt natürlich nicht wirklich, aber sie ist doch ganz praktisch um seine eigenen Skills zu showcasen. <br />
					Daher habe ich mir die Arbeit und habe meine eigene Website auf Basis von Symfony 5 und TailwindCSS aufgebaut und auf ihr mich selbst, meinen Lebenslauf und meine Projekte vorgestellt.<br />
					Ebenfalls einen eigenen Blog, der über einen RSS Feed abonniert werden kann, habe ich implementiert. 
				',
				'lessonsLearned' => '
					Vertiefung meines Symfony Wissens. <br /> 
					Wie man I18N Funktionalität in Symfony einbaut.  <br />
					Wie man einen Blog in einen RSS-Feed umwandelt <br />
					Wie man TailwindCSS in Symfony einsetzt. 
				',
				'githubLink' => 'https://github.com/araeuchle/adrianraeuchle.de'
			]
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

    	foreach ($this->projects as $projectItem) {
    		$project = new Project();
    		$project->setName($projectItem['name']);
    		$project->setSlug($projectItem['slug']);
    		$project->setDescription($projectItem['description']);
    		$project->setLessonsLearned($projectItem['lessonsLearned']);
    		$project->setGithubLink($projectItem['githubLink']);

			$manager->persist($project);
		}

        $manager->flush();
    }
}
