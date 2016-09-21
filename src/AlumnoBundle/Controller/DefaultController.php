<?php

namespace AlumnoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AlumnoBundle:Default:index.html.twig');
    }
}
