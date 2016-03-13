<?php

namespace AppBundle\Service;

use AppBundle\Entity\Post;
use AppBundle\Form\Type;
use Doctrine\ORM\EntityManager;

/**
 * Class PostManager
 */
class PostManager
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->em = $manager;
    }


    public function createPosts(Post $posts)
    {
        $this->em->persist($posts);
        $this->em->flush();
    }

    /**
     * Find all Posts
     *
     * @return \AppBundle\Entity\Post[]|array
     */
    public function readPosts()
    {
        $posts = $this->em->getRepository('AppBundle:Post')->findAll();

        return $posts;
    }

    /**
     * Find all the latest posts
     *
     * @param integer $num
     * @return array
     */
    public function findLatest($num)
    {
        $latestPost = $this->em->getRepository('AppBundle:Post')->findLatest($num);

        return $latestPost;
    }


}
