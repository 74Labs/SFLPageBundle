<?php

namespace SFL\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SFLPageBundle:Default:index.html.twig', array('name' => $name));
    }
}
