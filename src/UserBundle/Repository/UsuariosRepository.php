<?php

namespace UserBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * UsuariosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuariosRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUsuarios($currentPage, $limit)
    {
        // Create our query
        $query = $this->createQueryBuilder('usuarios')
        ->orderBy('usuarios.fechaCreacion', 'ASC')
        ->getQuery();

        $paginator = $this->paginate($query, $currentPage, $limit);

        return array('paginator' => $paginator, 'query' => $query);
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
