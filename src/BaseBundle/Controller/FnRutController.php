<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FnRutController extends Controller
{
    public function buscarRutAction(Request $request)
    {
    	if($request->getMethod() == 'POST')
    	{
    		// variables
    		$return = ['result' => false];
    		$em 	= $this->getDoctrine()->getManager('global_persona');
    		$rut 	= $request->get('rut');

    		if( $persona = $em->getRepository('BaseBundle:PerPersona')->findOneBy(['perDni' => $rut]) )
    		{
    			$return = [
    				'result' 	=> true,
    				'datos'		=> $persona
    			];
    		}


    		echo json_encode(['return' => $return]);
    		exit;
    	}

		// redirigir a salida
		return $this->redirectToRoute('base_fnsesion_salir');
        
    }
}
