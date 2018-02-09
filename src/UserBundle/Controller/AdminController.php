<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use PrincipalBundle\Entity\Contacto;
use PrincipalBundle\Entity\ActividadTurista;

class AdminController extends Controller
{
    /**
     * @Route("/admin/", name="admin")
     */
    public function adminAction()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->redirectToRoute('admin_usuarios');
    }

    /**
     * @Route("/admin/usuarios", name="admin_usuarios")
     */
    public function adminUsuariosAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->render('@User/Admin/admin.html.twig', array('usuarios'=>$usuarios));
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
        }

        return $this->render('@User/Admin/adminActividadesTuristas.html.twig', array('actividades'=>$actividadesTurista));
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
        return $this->render('@User/Admin/admin.html.twig', array('mensajes'=>$mensajes));
    }
}
