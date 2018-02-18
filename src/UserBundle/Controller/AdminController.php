<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use UserBundle\Entity\Filtro;
use UserBundle\Form\FiltroType;
use PrincipalBundle\Entity\ActividadTurista;
use PrincipalBundle\Entity\ActividadVoluntario;
use PrincipalBundle\Entity\Contacto;
use PrincipalBundle\Entity\Descuento;
use PrincipalBundle\Entity\Reserva;
use PrincipalBundle\Form\DescuentoType;

class AdminController extends Controller
{
    /**
     * @Route("/admin/", name="admin")
     */
    public function adminAction()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->redirectToRoute('admin_usuarios', array('page'=>'1'));
    }

    /**
     * @Route("/admin/usuarios/page={page}", defaults={"page"=1}, name="admin_usuarios")
     */
    public function adminUsuariosAction(Request $request, $page)
    {
        $filtroUsuario = new Filtro();
        $form= $this->createForm(FiltroType::class, $filtroUsuario);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $filtroUsuario = $form->getData();
        }

        $repository = $this->getDoctrine()->getRepository(User::class);
        // PAGINACION
        $limit = 50; // Límite de elementos por página
        $usuarios = $repository->getUsuarios($filtroUsuario, $page, $limit);
        $usuariosResultado = $usuarios['paginator'];
        $maxPages = ceil($usuarios['paginator']->count() / $limit);

        return $this->render('@User/Admin/admin.html.twig', array(
        'form' => $form->createView(),
        'usuarios'=>$usuariosResultado,
        'maxPages'=>$maxPages,
        'thisPage'=>$page));
    }

    /**
     * @Route("/admin/reservas/page={page}", defaults={"page"=1}, name="admin_reservas")
     */
    public function adminReservasAction(Request $request, $page)
    {
        $repository = $this->getDoctrine()->getRepository(Reserva::class);

        $limit = 50; // Límite de reservas mostradas por página
        $reservas = $repository->getReservas($page, $limit);
        $reservasResultado = $reservas['paginator'];
        $maxPages = ceil($reservas['paginator']->count() / $limit);

        return $this->render('@User/Admin/adminReservas.html.twig', array(
          'reservas'=>$reservasResultado,
          'maxPages'=>$maxPages,
          'thisPage'=>$page));
    }

    /**
     * @Route("/admin/actividades_{tipo}", name="admin_actividades")
     */
    public function adminActividadesAction($tipo)
    {
        if($tipo=="turista"){
          $actividadesTurista = $this->getDoctrine()->getRepository(ActividadTurista::class)->findAll();
          return $this->render('@User/Admin/adminActividadesTuristas.html.twig', array('actividades'=>$actividadesTurista));
        }else if($tipo=="voluntario"){
          $actividadesVoluntario = $this->getDoctrine()->getRepository(ActividadVoluntario::class)->findAll();
          return $this->render('@User/Admin/adminActividadesVoluntarios.html.twig', array('actividades'=>$actividadesVoluntario));
        }
    }

    /**
     * @Route("/admin/descuentos", name="admin_descuentos")
     */
    public function adminDescuentosAction(Request $request)
    {
        $id = 1;
        $em = $this->getDoctrine()->getManager();
        $descuento = $em->getRepository(Descuento::class)->find($id);

        if (!$descuento) {
            throw $this->createNotFoundException(
                'Ningun descuento coincide con la id '.$id
            );
        }

        $form = $this->createForm(DescuentoType::class, $descuento);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
          // $form->getData() holds the submitted values
          // but, the original `$descuento` variable has also been updated
          $descuento = $form->getData();

          $em = $this->getDoctrine()->getManager();
          $em->persist($descuento);
          $em->flush();

          return $this->redirectToRoute('admin_descuentos');
        }
        return $this->render('@User/Admin/adminDescuento.html.twig',
            array('form' => $form->createView(), 'actividad'=>$descuento));
    }

    /**
     * @Route("/admin/mensajes/page={page}", defaults={"page"=1}, name="admin_mensajes")
     */
    public function adminMensajesAction($page)
    {

        $repository = $this->getDoctrine()->getRepository(Contacto::class);

        $limit = 50; // Límite de elementos por página
        $mensajes = $repository->getContactos($page, $limit);
        $mensajesResultado = $mensajes['paginator'];

        $maxPages = ceil($mensajes['paginator']->count() / $limit);
        return $this->render('@User/Admin/adminMensajes.html.twig', array(
        'mensajes'=>$mensajesResultado,
        'maxPages'=>$maxPages,
        'thisPage'=>$page));
    }

    /**
     * @Route("/admin/eliminarReserva/id={id}", name="eliminar_reserva")
     */
    public function eliminarActividadVoluntarioAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reserva = $em->getRepository(Reserva::class)->find($id);
        if (!$reserva) {
            throw $this->createNotFoundException(
                'Ninguna reserva coincide con la id '.$id
            );
        }
        $em->remove($reserva);
        $em->flush();

        return $this->redirectToRoute('admin_reservas');
    }
}
