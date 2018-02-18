<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserva
 *
 * @ORM\Table(name="reservas")
 * @ORM\Entity(repositoryClass="PrincipalBundle\Repository\ReservaRepository")
 */
class Reserva
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
     * @ORM\Column(name="tipo", type="string", length=40)
     */
    private $tipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reserva", type="date")
     */
    private $fechaReserva;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_noches", type="integer")
     */
    private $numeroNoches;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_habitacion", type="string", length=255)
     */
    private $tipoHabitacion;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_habitaciones", type="integer")
     */
    private $numeroHabitaciones;

    /**
     * @var bool
     *
     * @ORM\Column(name="comida", type="boolean", nullable=true)
     */
    private $comida;

    /**
     * @var bool
     *
     * @ORM\Column(name="cena", type="boolean", nullable=true)
     */
    private $cena;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_vuelo", type="string", length=255)
     */
    private $numeroVuelo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_llegada", type="time")
     */
    private $horaLlegada;

    /**
     * @var bool
     *
     * @ORM\Column(name="barca", type="boolean", nullable=true)
     */
    private $barca;

    /**
     * @var bool
     *
     * @ORM\Column(name="visita_escuela", type="boolean", nullable=true)
     */
    private $visitaEscuela;

    /**
     * @var string
     *
     * @ORM\Column(name="actividades", type="string", nullable=true)
     */
    private $actividades;

    /**
     * @var int
     *
     * @ORM\Column(name="descuento", type="integer", nullable=true)
     */
    private $descuento;


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Reserva
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fechaReserva
     *
     * @param \DateTime $fechaReserva
     *
     * @return Reserva
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    /**
     * Get fechaReserva
     *
     * @return \DateTime
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * Set numeroNoches
     *
     * @param integer $numeroNoches
     *
     * @return Reserva
     */
    public function setNumeroNoches($numeroNoches)
    {
        $this->numeroNoches = $numeroNoches;

        return $this;
    }

    /**
     * Get numeroNoches
     *
     * @return int
     */
    public function getNumeroNoches()
    {
        return $this->numeroNoches;
    }

    /**
     * Set tipoHabitacion
     *
     * @param string $tipoHabitacion
     *
     * @return Reserva
     */
    public function setTipoHabitacion($tipoHabitacion)
    {
        $this->tipoHabitacion = $tipoHabitacion;

        return $this;
    }

    /**
     * Get tipoHabitacion
     *
     * @return string
     */
    public function getTipoHabitacion()
    {
        return $this->tipoHabitacion;
    }

    /**
     * Set numeroHabitaciones
     *
     * @param integer $numeroHabitaciones
     *
     * @return Reserva
     */
    public function setNumeroHabitaciones($numeroHabitaciones)
    {
        $this->numeroHabitaciones = $numeroHabitaciones;

        return $this;
    }

    /**
     * Get numeroHabitaciones
     *
     * @return int
     */
    public function getNumeroHabitaciones()
    {
        return $this->numeroHabitaciones;
    }

    /**
     * Set comida
     *
     * @param boolean $comida
     *
     * @return Reserva
     */
    public function setComida($comida)
    {
        $this->comida = $comida;

        return $this;
    }

    /**
     * Get comida
     *
     * @return bool
     */
    public function getComida()
    {
        return $this->comida;
    }

    /**
     * Set cena
     *
     * @param boolean $cena
     *
     * @return Reserva
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return bool
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set numeroVuelo
     *
     * @param string $numeroVuelo
     *
     * @return Reserva
     */
    public function setNumeroVuelo($numeroVuelo)
    {
        $this->numeroVuelo = $numeroVuelo;

        return $this;
    }

    /**
     * Get numeroVuelo
     *
     * @return string
     */
    public function getNumeroVuelo()
    {
        return $this->numeroVuelo;
    }

    /**
     * Set horaLlegada
     *
     * @param \DateTime $horaLlegada
     *
     * @return Reserva
     */
    public function setHoraLlegada($horaLlegada)
    {
        $this->horaLlegada = $horaLlegada;

        return $this;
    }

    /**
     * Get horaLlegada
     *
     * @return \DateTime
     */
    public function getHoraLlegada()
    {
        return $this->horaLlegada;
    }

    /**
     * Set barca
     *
     * @param boolean $barca
     *
     * @return Reserva
     */
    public function setBarca($barca)
    {
        $this->barca = $barca;

        return $this;
    }

    /**
     * Get barca
     *
     * @return bool
     */
    public function getBarca()
    {
        return $this->barca;
    }

    /**
     * Set visitaEscuela
     *
     * @param boolean $visitaEscuela
     *
     * @return Reserva
     */
    public function setVisitaEscuela($visitaEscuela)
    {
        $this->visitaEscuela = $visitaEscuela;

        return $this;
    }

    /**
     * Get visitaEscuela
     *
     * @return bool
     */
    public function getVisitaEscuela()
    {
        return $this->visitaEscuela;
    }

    /**
     * Set actividades
     *
     * @param string $actividades
     *
     * @return Reserva
     */
    public function setActividades($actividades)
    {
        $this->actividades = $actividades;

        return $this;
    }

    /**
     * Get actividades
     *
     * @return string
     */
    public function getActividades()
    {
        return $this->actividades;
    }

    /**
     * Set descuento
     *
     * @param integer $descuento
     *
     * @return Reserva
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return int
     */
    public function getDescuento()
    {
        return $this->descuento;
    }
}
