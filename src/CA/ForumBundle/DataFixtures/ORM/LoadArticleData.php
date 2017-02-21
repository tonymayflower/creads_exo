<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CA\ForumBundle\Entity\Article;
use CA\UserBundle\Entity\User;


class LoadArticleData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{		
		$article1 = new Article();
		$article1->setTitre("Creads,la startup qui le vent en poupe !");
		$article1->setNombreLike(42);
		
		$article2 = new Article();
		$article2->setTitre("Creads recrute !!");
		$article2->setNombreLike(42);
		
		$userCreads = new User();
		$userCreads->setUsername('creads');
		$userCreads->setPassword('creads');
		$userCreads->setEmail('creads@gmail.com');
		$userCreads->setLikedArticles($article1);
		$userCreads->setLikedArticles($article2);
		
		
		$manager->persist($userCreads);

		$manager->persist($article1);
		$manager->flush();
	}
}