<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FnSesionController extends Controller
{
    public function salirAction()
    {
    	echo 'salir';
        exit;
        
    }
}
