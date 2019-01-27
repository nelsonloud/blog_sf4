<?php

namespace App\Controller;


use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $posts = $this->getDoctrine()
                      ->getRepository(Post::class)
                      ->findAll();

        var_dump($posts);

        return new Response('fuck you!!');
    }
}
