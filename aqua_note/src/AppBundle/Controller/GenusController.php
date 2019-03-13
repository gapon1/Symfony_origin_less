<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-13
 * Time: 12:04
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{

    /**
     * @Route("/genus/{genusName} ")
     *
     */

    public function showAction($genusName)
    {

        $notes = ['Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'Consectetur culpa cumque doloribus eligendi incidunt',
            'laudantium maiores molestiae necessitatibus quas ratione!'];

        return $this->render('genus/show.html.twig', [
            'name' => $genusName,
            'notes' => $notes
        ]);

    }

}