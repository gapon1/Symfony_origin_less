<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-13
 * Time: 12:04
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GenusController
{

    /**
     * @Route("/genus")
     *
     */

    public function showAction()
    {
     return new Response('Hello text');
    }

}