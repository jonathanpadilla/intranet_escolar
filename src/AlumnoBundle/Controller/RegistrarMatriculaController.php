<?php

namespace AlumnoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrarMatriculaController extends Controller
{
	/****** VISTAS ******/
    public function registrarMatriculaAction()
    {
        return $this->render('AlumnoBundle::registrar-matricula.html.twig');
    }

    /****** AJAX ******/

    /****** METODOS ******/
}
