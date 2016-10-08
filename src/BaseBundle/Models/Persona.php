<?php

namespace BaseBundle\Models;

use Doctrine\ORM\EntityRepository;

class Persona extends EntityRepository
{

	public function getPersonaByRut($rut = false, $datos = false)
	{
		$return = false;

		// $em = $this->getDoctrine()->getManager('global_persona');

		// if($rut)
		// {
		// 	if( $persona = $this->em->getRepository('BaseBundle:PerPersona')->findOneBy(['perDni' => $rut]) )
		// 	{
		// 	}
		// 	$return = true;
		// }

		return $return;
	}
}