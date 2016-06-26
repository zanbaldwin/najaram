<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $posts = $this->getPostManager()->showAllPosts();
        $latestPosts = $this->getPostManager()->findLatest(5);

        return $this->render('AppBundle:Post:index.html.twig', [
            'posts' => $posts,
            'latestPosts' => $latestPosts,
        ]);
    }

    /**
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($slug)
    {
        $post = $this->getPostManager()->findBySlug($slug);

        return $this->render('AppBundle:Post:show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @return \AppBundle\Service\PostManager
     */
    private function getPostManager()
    {
        return $this->get('postmanager');
    }
}