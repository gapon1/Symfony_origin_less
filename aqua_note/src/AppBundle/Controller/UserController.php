<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-26
 * Time: 22:25
 */

namespace AppBundle\Controller;


use AppBundle\Form\UserregistrationForm;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{


    /**
     * @Route("/register", name="register")
     *
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(UserregistrationForm::class);

        $form->handleRequest($request);

//        dump($form);
//        die();

        if ($form->isValid()){
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', ' Welcome ' . $user->getEmail());


            return $this->get('security.authentication.guard_handler')
                ->authenticateUserAndHandleSuccess(
                    $user,
                    $request,
                    $this->get('app.security.login_form_authenticator'),
                    'main'
                    );
        }


        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);

    }

}