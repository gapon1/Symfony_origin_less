<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-21
 * Time: 19:33
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction(){
        return $this->render('main/homepage.html.twig');
    }

}