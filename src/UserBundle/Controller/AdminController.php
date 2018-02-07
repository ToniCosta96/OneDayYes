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
        return $this->render('@User/Admin/admin.html.twig', array('usuarios'=>$usuarios));
    }
}
