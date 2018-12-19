<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 18/12/18
 * Time: 11:35
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function home() : Response
    {
        return $this->render('home.html.twig');
    }
}