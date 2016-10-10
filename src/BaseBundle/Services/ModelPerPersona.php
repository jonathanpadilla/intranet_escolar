<?php
namespace BaseBundle\Services;

use Doctrine\ORM\EntityManager;

class ModelPerPersona
{
	protected $em;

	public function __construct(EntityManager $entityManager)
	{
		$this->em = $entityManager;
	}

	public function getPersonaByRut($rut = false, $datos = false)
	{
		$return = false;

		$qb = $this->em->createQueryBuilder();

		$qb->select('p')
            ->from('BaseBundle:PerPersona', 'p')
            ->where('p.perDni LIKE :rut')
            ->setParameter('rut', '%"' . $rut . '"%');
		
		return $qb->getQuery()->getResult();

		// return $return;
	}
}