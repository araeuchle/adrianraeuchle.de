<?php
namespace App\Services;

use App\Entity\Post;

class RssFeedGenerator
{
	/**
	 * @var PostService
	 */
	private $postService;

	/**
	 * RssFeedGenerator constructor.
	 * @param PostService $postService
	 */
	public function __construct(PostService $postService)
	{
		$this->postService = $postService;
	}

	public function generateFeed()
	{
		/** @var Post[] $posts */
		$posts = $this->postService->getAllPosts();

		$xml = <<<xml
<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>Adrian's Web Dev Blog</title>
<link>https://adiranraeuchle.de</link>
<description>Web Developer Blog</description>
<language>de-de</language>
xml;
		/** @var Post $post */
		foreach ($posts as $post) {

			$title = self::xmlEscape($post->getTitle());
			$url = self::xmlEscape($post->getSlug());
			$description = self::xmlEscape(strip_tags($post->getShortBody()));
			$pubDate = $post->getCreatedAt()->format('D, d M Y H:i:s') . ' +0200';
			$guid = $post->getId();
			$xml .= <<<xml
<item>
<title>{$title}</title>
<link>https://adrianraeuchle.de/blog/{$url}</link>
<description>{$description}</description>
<author>a.raeuchle@gmx.de (Adrian Räuchle)</author>
<pubDate>$pubDate</pubDate>
<guid>https://adrianraeuchle.de/blog/{$url}</guid>
</item>
xml;
		}
		$xml .= "</channel></rss>";

		return $xml;

	}

	private static function xmlEscape($string)
	{
		return str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string);
	}
}
