<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateAdminUserCommand extends Command
{
    protected static $defaultName = 'create:admin-user';

	/**
	 * @var EntityManagerInterface
	 */
    private $entityManager;

	/**
	 * @var UserPasswordEncoderInterface
	 */
    private $passwordEncoder;

    public function __construct(
    	EntityManagerInterface  $entityManager,
    	UserPasswordEncoderInterface  $passwordEncoder,
    	string $name = null
	) {
		parent::__construct($name);
		$this->entityManager = $entityManager;
		$this->passwordEncoder = $passwordEncoder;
	}

	protected function configure()
    {
        $this
            ->setDescription('Creates an Admin User')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
    	$helper = $this->getHelper('question');

    	$userNameQuestion = new Question('Which name should the admin user have?');

    	$username = $helper->ask($input, $output, $userNameQuestion);

    	$passwordQuestion = new Question('Which password do you want to use?');

		$password = $helper->ask($input, $output, $passwordQuestion);

		$user = new User();
		$user->setName($username);
		$user->setPassword($this->passwordEncoder->encodePassword($user, $password));
		$this->entityManager->persist($user);
		$this->entityManager->flush();


        return Command::SUCCESS;
    }
}
