<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PrincipalBundle\Form\ReservaType;
use PrincipalBundle\Entity\Reserva;
use Symfony\Component\HttpFoundation\Request;

class ViajesController extends Controller
{
    /**
     * @Route("/{_locale}/viajes", name="viajes")
     */
    public function viajesAction()
    {
        return $this->redirectToRoute('ven_a_lamu', array('_locale' => $this->container->get('translator')->getLocale()));
    }

    /**
     * @Route("/{_locale}/viajes/index", name="ven_a_lamu")
     */
    public function viajesIndexAction()
    {
        return $this->render('@Principal/Viajes/viajesIndex.html.twig');
    }

    /**
     * @Route("/{_locale}/viajes/reserva", name="reserva")
     */
    public function reservaAction(Request $request)
    {
        $reserva = new Reserva();
        $form = $this -> createForm(ReservaType::Class, $reserva);
        $form->handleRequest($request);
        if ($form -> isSubmitted()&& $form -> isValid()){
          $reserva = $form->getData();
          $em = $this->getDoctrine()->getManager();
          $em -> persist($reserva);
          $em -> flush();
          return $this->redirectToRoute('datos_reserva');
        }
        return $this->render('@Principal/Viajes/reserva.html.twig', array('form' => $form -> createView()));
    }

    /**
     * @Route("/{_locale}/viajes/datos_reserva", name="datos_reserva")
     */
    public function datosReservaAction()
    {
        return $this->render('@Principal/Viajes/datosReserva.html.twig');
    }
}
