<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomePageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function listAction()
    {
        $news = $this->getDoctrine()->getRepository(News::class)->newsFromNewest();

        return $this->render('AppBundle:HomePage:list.html.twig', array(
            'news'=>$news,
        ));
    }

}
