<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('@Principal/Default/index.html.twig');
    }

    /**
     * @Route("/conocenos", name="conocenos")
     */
    public function conocenosAction()
    {
        return $this->render('@Principal/Default/conocenos.html.twig');
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contactoAction()
    {
        return $this->render('@Principal/Default/contacto.html.twig');
    }
}
