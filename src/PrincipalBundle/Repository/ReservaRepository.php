<?php

namespace PrincipalBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ReservaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservaRepository extends \Doctrine\ORM\EntityRepository
{
    public function getReservas($currentPage, $limit)
    {
        // Se crea la consulta
        $query = $this->createQueryBuilder('r');

        // Se crean los parámetros para la cláusula WHERE
        /*$stringWhere = "";
        $parameters = [];
        if(!is_null($filtro->getNombre())){
          $stringWhere = "(u.name = :nombre OR u.username = :nombre)";
          $parameters['nombre'] = $filtro->getNombre();
        }
        if(!is_null($filtro->getEmail())){
          if(count($parameters)>0){
            $stringWhere .= " OR u.email = :correo";
          }else{
            $stringWhere = "u.email = :correo";
          }
          $parameters['correo'] = $filtro->getEmail();
        }
        if(!is_null($filtro->getFechaInicial())){
          if(count($parameters)>0){
            $stringWhere .= " and u.fechaCreacion >= :fecha_inicial";
          }else{
            $stringWhere = "u.fechaCreacion >= :fecha_inicial";
          }
          $parameters['fecha_inicial'] = $filtro->getFechaInicial();
        }
        if(!is_null($filtro->getFechaFinal())){
          if(count($parameters)>0){
            $stringWhere .= " and u.fechaCreacion <= :fecha_final";
          }else{
            $stringWhere = "u.fechaCreacion <= :fecha_final";
          }
          $parameters['fecha_final'] = $filtro->getFechaFinal();
        }
        // Se crea y añade la cláusula WHERE a la consulta
        if(count($parameters)>0){
          $query
          ->where($stringWhere)
          ->setParameters($parameters);
        }*/

        // Se crea el Paginator
        $paginator = $this->paginate($query->getQuery(), $currentPage, $limit);

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
