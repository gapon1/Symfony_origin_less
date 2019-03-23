<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-13
 * Time: 12:04
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Genus;
use AppBundle\Entity\GenusNote;
use AppBundle\Service\MarkdownTransformer;
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

        $genusNote = new GenusNote();
        $genusNote->setUsername('vitalii');
        $genusNote->setUseAvatarFilename('ryan.jpeg');
        $genusNote->setNote('some long note');
        $genusNote->setCreatedAt(new \DateTime('-1 month'));
        $genusNote->setGenus($genus);



        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->persist($genusNote);
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
        $genuses = $em->getRepository("AppBundle:Genus")->findAllPublishedByRecentlyActive();

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


        $transformer = $this->get('app.markdown_transformer');


        $funFact = $transformer->parse($genus->getFunFact());

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


        $recentNotes = $em->getRepository('AppBundle:GenusNote')
            ->findAllRecentNoteForGenus($genus);


        return $this->render('genus/show.html.twig', [
            'genus' => $genus,
            'funFact' => $funFact,
            'recentCountNotes' => count($recentNotes)
        ]);

    }


    /**
     * @Route("/genus/{name}/notes", name="genus_show_notes")
     * @Method("GET")
     *
     */

    public function getNotesAction(Genus $genus)
    {

        $notes = [];
        foreach ($genus->getNotes() as $note){
            $notes[] = [
              'id' => $note->getId(),
                'username' => $note->getUsername(),
                'avatarUri' => '/images/'.$note->getUseAvatarFilename(),
                'note' => $note->getNote(),
                'date' => $note->getCreatedAt()->format('M d, Y')
            ];

        }



        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);
    }

}