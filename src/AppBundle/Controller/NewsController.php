<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NewsController extends Controller
{
    /**
     * @Route("/admin/news/list")
     */
    public function listAction()
    {
        return $this->render('AppBundle:News:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/admin/news/{id}/edit")
     */
    public function editAction($id)
    {
        return $this->render('AppBundle:News:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/admin/news/create")
     */
    public function createAction()
    {
        return $this->render('AppBundle:News:create.html.twig', array(
            // ...
        ));
    }

}
