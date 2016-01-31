<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomePageController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        return $this->render('AppBundle:HomePage:list.html.twig', array(
            // ...
        ));
    }

}
