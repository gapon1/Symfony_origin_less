<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-24
 * Time: 00:02
 */

namespace AppBundle\Controller\Admin;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\GenusFormType;
use Symfony\Component\HttpFoundation\Request;

class GenusAdminController extends Controller
{


    /**
     * @Route("/genus/new", name="admin_genus_new")
     *
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(GenusFormType::class);

        //use only for POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            dump($form->getData()); die();
        }

        return $this->render('admin/genus/new.html.twig', [
            'genusForm' => $form->createView()
        ]);
    }

}