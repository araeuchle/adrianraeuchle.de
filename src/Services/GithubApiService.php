<?php
namespace App\Services;

use Github\Client;

class GithubApiService
{
	/**
	 * @var Client
	 */
	private $client;

	const GITHUB_USERNAME = 'araeuchle';

	public function __construct()
	{
		$this->client = new Client();
	}

	public function getProjectCount()
	{
		try
		{
			$count = count($this->client->api('user')->repositories(self::GITHUB_USERNAME));
		}
		catch(\Exception $e)
		{
			return 'n/a';
		}

		return  $count;
	}

	public function getDaysCount()
	{
		try {
			$startedAt = new \DateTime($this->client->api('user')->show(self::GITHUB_USERNAME)['created_at']);
			$now = new \DateTime();
		}
		catch(\Exception $e)
		{
			return 'n/a';
		}

		return $startedAt->diff($now)->days;
	}

	public function getFollowersCount()
	{
		try {
			$followersCount = count($this->client->api('user')->followers(self::GITHUB_USERNAME));
		}
		catch(\Exception $e)
		{
			return 'n/a';
		}


		return $followersCount;
	}
}
