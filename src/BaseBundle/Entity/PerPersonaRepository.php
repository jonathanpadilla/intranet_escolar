<?php
namespace BaseBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PerPersonaRepository extends EntityRepository
{
	public function findPersonaById($id = false)
	{
		$return = true;

		return $return;
	}
}