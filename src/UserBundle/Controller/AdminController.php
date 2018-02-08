<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

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
     * @Route("/admin/actividades", name="admin_actividades")
     */
    public function adminActividadesAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->render('@User/Admin/admin.html.twig', array('usuarios'=>$usuarios));
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
        $repository = $this->getDoctrine()->getRepository(User::class);
        $usuarios = $repository->findAll();
        return $this->render('@User/Admin/admin.html.twig', array('usuarios'=>$usuarios));
    }
}
