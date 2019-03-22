<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-13
 * Time: 12:04
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{

    /**
     * @Route("/genus/new")
     *
     */
    public function newAction()
    {
        $genus = new Genus();
        $genus->setName("ocupus".rand(0, 100));
        $genus->setFunFact("fun fact");
        $genus->setSubFamily("Ocupus");
        $genus->setSpecCount(rand(100, 999));


        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();

        return new Response('<html><body>Genus Create</body></html>');
    }


    /**
     *
     * @Route("/genus")
     */
    public function listAtion()
    {
        $em = $this->getDoctrine()->getManager();


        // Shoe data use method ========= findAllPublishedBySize
        $genuses = $em->getRepository("AppBundle:Genus")->findAllPublishedBySize();

        return $this->render("genus/list.html.twig", [
            "genuses" => $genuses,
        ]);

    }


    /**
     * @Route("/genus/{genusName}", name="genus_show")
     *
     */

    public function showAction($genusName)
    {

        $em = $this->getDoctrine()->getManager();
        $genus = $em->getRepository('AppBundle:Genus')->findOneBy(['name' => $genusName]);

        if (!$genus){
            throw $this->createNotFoundException("No found Line");
        }


        /*
        $cache = $this->get('doctrine_cache.providers.my_markdown_cache');
        $key = md5($funFact);

        if ($cache->contains($key)){
            $funFact = $cache->fetch($key);
        }else{
            sleep(1);
            $funFact = $this->get('markdown.parser')->transform($funFact);

            $cache->save($key, $funFact);
        }
*/



        return $this->render('genus/show.html.twig', [
            'genus' => $genus
        ]);

    }


    /**
     * @Route("/genus/{genusName}/notes", name="genus_show_notes")
     * @Method("GET")
     *
     */

    public function getNotesAction()
    {


        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'date' => 'Dec. 12, 2019'],
            ['id' => 2, 'username' => 'AquaPelham', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'Amet blanditiis, cupiditate distinctio enim error'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'ipsum iste nostrum ratione soluta voluptatibus!'],
        ];

        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);
    }

}