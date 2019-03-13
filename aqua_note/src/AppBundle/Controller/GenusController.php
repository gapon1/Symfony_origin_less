<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-13
 * Time: 12:04
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{

    /**
     * @Route("/genus/{genusName} ")
     *
     */

    public function showAction($genusName)
    {


        return $this->render('genus/show.html.twig', [
            'name' => $genusName
        ]);

    }


    /**
     * @Route("/genus/{genusName}/notes")
     * @Method("GET")
     *
     */

    public function getNotesAction()
    {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'],
            ['id' => 2, 'username' => 'AquaPelham', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'Amet blanditiis, cupiditate distinctio enim error'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'ipsum iste nostrum ratione soluta voluptatibus!'],
        ];

        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);
    }

}