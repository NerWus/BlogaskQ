<?php
/**
 * Created by PhpStorm.
 * User: dom
 * Date: 28.05.19
 * Time: 12:34
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();
            $post->setTitle($faker->sentence(3));
            $post->setLead($faker->text(300));
            $post->setContent($faker->text(700));
            $post->setCreatedAt($faker->dateTimeThisMonth);
            $manager->persist($post);
        }


        $manager->flush();
    }
}