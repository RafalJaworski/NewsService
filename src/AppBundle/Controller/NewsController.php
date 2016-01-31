<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Form\NewEntryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @Route("/admin/news/list", name="admin_news_list")
     */
    public function listAction()
    {
        $news = $this->getDoctrine()->getRepository(News::class)->newsFromNewest();

        return $this->render('AppBundle:News:list.html.twig', array(
            'news'=>$news,
        ));
    }

    /**
     * @Route("/admin/news/{id}/edit", name="admin_news_edit")
     */
    public function editAction(Request $request, $id)
    {
        $entry = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);

        $form = $this->createForm(NewEntryType::class,$entry);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //saving entity
            $em = $this->getDoctrine()->getManager();
            $em->persist($entry);
            $em->flush();

            return $this->redirectToRoute('admin_news_list');
        }

        return $this->render('AppBundle:News:edit.html.twig', array(
            'form'=>$form->createView(),
        ));
    }

    /**
     * @Route("/admin/news/create", name="admin_news_create")
     */
    public function createAction(Request $request)
    {
        $news = new News();
        $form = $this->createForm(NewEntryType::class,$news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //saving entity
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('admin_news_list');
        }

        return $this->render('AppBundle:News:create.html.twig', array(
            'form'=>$form->createView(),
        ));
    }

}
