<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use PrincipalBundle\Entity\Contacto;
use PrincipalBundle\Entity\ActividadTurista;
use PrincipalBundle\Entity\ActividadVoluntario;

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
    public function adminUsuariosAction($page)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);

        $limit = 3;
        $usuarios = $repository->getUsuarios($page, $limit);
        $usuariosResultado = $usuarios['paginator'];

        $maxPages = ceil($usuarios['paginator']->count() / $limit);
        return $this->render('@User/Admin/admin.html.twig', array(
        'usuarios'=>$usuariosResultado,
        'maxPages'=>$maxPages,
        'thisPage'=>$page));
    }

    /**
     * @Route("/admin/reservas", name="admin_reservas")
     */
    public function adminReservasAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->render('@User/Admin/admin.html.twig', array('usuarios'=>$usuarios));
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
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->render('@User/Admin/admin.html.twig', array('usuarios'=>$usuarios));
    }

    /**
     * @Route("/admin/mensajes", name="admin_mensajes")
     */
    public function adminMensajesAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Contacto::class);
        $mensajes = $repository->findAll();
        return $this->render('@User/Admin/adminMensajes.html.twig', array('mensajes'=>$mensajes));
    }
}
