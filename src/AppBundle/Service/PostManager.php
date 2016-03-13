<?php

namespace AppBundle\Service;

use AppBundle\Entity\Post;
use AppBundle\Form\Type;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @param EntityManager $manager
     * @param FormFactoryInterface $formFactoryInterface
     */
    public function __construct(EntityManager $manager, FormFactoryInterface $formFactoryInterface)
    {
        $this->em = $manager;
        $this->formFactory = $formFactoryInterface;
    }


    public function createPosts(Request $request)
    {
        $posts = new Post();

        $form = $this->formFactory->create(PostType, $posts);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->em->persist($posts);
            $this->em->flush();

            return true;
        }

        return $form;
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
