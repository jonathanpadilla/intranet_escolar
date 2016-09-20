<?php

namespace ColegioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ColegioBundle:Default:index.html.twig');
    }
}
