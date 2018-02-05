<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/usuarios/login", name="login")
     */
    public function usuariosLoginAction()
    {
        return $this->render('@User/Default/login.html.twig');
    }
}
