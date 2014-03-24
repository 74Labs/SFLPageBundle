<?php

namespace SFL\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SFL\PageBundle\Form\Type\PageType;

class DefaultController extends Controller
{
    
    public function indexAction($url, Request $request)
    {
        $page = $this->getDoctrine()->getRepository('SFLPageBundle:Page')->findOneByUrl($url);
        
        $edit = $request->query->has('edit');
        
        $delete = $request->query->has('delete');
        
        if($page && $page->getUrl() !== $url) 
            return $this->redirect($page->getUrl());
        
        if(!$edit) {
            if(!$page || !$page->isPublished()) throw $this->createNotFoundException('Page not exists');
            return $this->render('SFLPageBundle:Default:page.html.twig', array('title' => $page->getTitle(), 'content' => $page->getContent(), 'layout' => $page->getLayout()));
        }
        
        if(!$page) {
        	$page = new \SFL\PageBundle\Entity\Page();
        	$page->setUrl($url);
        }
     
        $form = $this->createForm(new PageType(), $page);
        
        if ($request->getMethod() == 'POST') {
        
            $form->handleRequest($request);
        
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($page);
                $this->getDoctrine()->getManager()->flush();
                $this->get('session')->getFlashBag()->add('info', 'Page was saved.');
                return $this->redirect('/' . $page->getUrl());
            } else {
                $this->get('session')->getFlashBag()->add('error', 'Form contains errors.');
            }
        }
        
        return $this->render('SFLPageBundle:Default:edit.html.twig', array('form' => $form->createView()));
    }
    
}
