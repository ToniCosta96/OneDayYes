<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ViajesController extends Controller
{
    /**
     * @Route("/viajes", name="viajes")
     */
    public function viajesAction()
    {
        return $this->redirectToRoute('ven_a_lamu');
    }

    /**
     * @Route("/viajes/index", name="ven_a_lamu")
     */
    public function viajesIndexAction()
    {
        return $this->render('@Principal/Viajes/viajesIndex.html.twig');
    }

    /**
     * @Route("/viajes/reserva", name="reserva")
     */
    public function reservaAction()
    {
        return $this->render('@Principal/Viajes/reserva.html.twig');
    }
}
