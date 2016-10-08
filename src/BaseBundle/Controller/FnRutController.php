<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BaseBundle\Models\Persona;

class FnRutController extends Controller
{
    public function buscarRutAction(Request $request)
    {
    	if($request->getMethod() == 'POST')
    	{
    		// variables
    		$return = false;
    		$rut 	= $request->get('rut');

    		$persona = new Persona();
    		$return = $persona->getPersonaByRut($rut, false);

    		echo json_encode(['return' => $return]);
    		exit;
    	}

		// redirigir a salida
		return $this->redirectToRoute('base_fnsesion_salir');
        
    }
}
