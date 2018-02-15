<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActividadVoluntario
 *
 * @ORM\Table(name="actividades_voluntario")
 * @ORM\Entity(repositoryClass="PrincipalBundle\Repository\ActividadVoluntarioRepository")
 */
class ActividadVoluntario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_en", type="string", length=255, nullable=true)
     */
    private $tituloEN;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_de", type="string", length=255, nullable=true)
     */
    private $tituloDE;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1024, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_en", type="string", length=1024, nullable=true)
     */
    private $descripcionEN;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_de", type="string", length=1024, nullable=true)
     */
    private $descripcionDE;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=512, nullable=true)
     */
    private $imagen;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return ActividadVoluntario
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set titulo_en
     *
     * @param string $tituloEN
     *
     * @return ActividadVoluntario
     */
    public function setTituloEN($tituloEN)
    {
        $this->tituloEN = $tituloEN;

        return $this;
    }

    /**
     * Get titulo_en
     *
     * @return string
     */
    public function getTituloEN()
    {
        return $this->tituloEN;
    }

    /**
     * Set titulo_de
     *
     * @param string $tituloDE
     *
     * @return ActividadVoluntario
     */
    public function setTituloDE($tituloDE)
    {
        $this->tituloDE = $tituloDE;

        return $this;
    }

    /**
     * Get titulo_de
     *
     * @return string
     */
    public function getTituloDE()
    {
        return $this->tituloDE;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ActividadVoluntario
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set descripcion_en
     *
     * @param string $descripcionEN
     *
     * @return ActividadVoluntario
     */
    public function setDescripcionEN($descripcionEN)
    {
        $this->descripcionEN = $descripcionEN;

        return $this;
    }

    /**
     * Get descripcion_en
     *
     * @return string
     */
    public function getDescripcionEN()
    {
        return $this->descripcionEN;
    }

    /**
     * Set descripcion_de
     *
     * @param string $descripcionDE
     *
     * @return ActividadVoluntario
     */
    public function setDescripcionDE($descripcionDE)
    {
        $this->descripcionDE = $descripcionDE;

        return $this;
    }

    /**
     * Get descripcion_de
     *
     * @return string
     */
    public function getDescripcionDE()
    {
        return $this->descripcionDE;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return ActividadVoluntario
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }
}
