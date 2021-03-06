<?php

namespace PrincipalBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * contactoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactoRepository extends \Doctrine\ORM\EntityRepository
{
    public function getContactos($currentPage, $limit)
    {
        // Create our query
        $query = $this->createQueryBuilder('contacto')
        //->orderBy('contacto.fechaCreacion', 'ASC')
        ->getQuery();

        $paginator = $this->paginate($query, $currentPage, $limit);

        return array('paginator' => $paginator);
    }

    public function paginate($dql, $page, $limit)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
        ->setFirstResult($limit * ($page - 1)) // Offset
        ->setMaxResults($limit); // Limit

        return $paginator;
    }
}
