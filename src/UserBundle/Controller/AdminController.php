<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin/", name="admin")
     */
    public function adminAction(Request $request)
    {
        return $this->render('@User/Admin/admin.html.twig');
    }
}
