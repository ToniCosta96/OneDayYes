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
    public function adminAction(Request $request)
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
}
