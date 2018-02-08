<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use UserBundle\Entity\User;
use UserBundle\Entity\Role;
use UserBundle\Form\UserType;

class UserController extends Controller
{
    /**
     * @Route("/usuarios/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@User/Default/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/usuarios/registro", name="registro")
     */
    public function registroAction(Request $request)
    {
        // 1) Build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) Handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            //$password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 3.1) Guardar rol del usuario
            $user->setRoles(["ROLE_USER"]);

            // 4) Guardar el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('ven_a_lamu');
        }

        return $this->render(
            '@User/Default/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/usuarios/eliminarUsuario/id={id}", name="eliminar_usuario")
     */
    public function eliminarUsuarioAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(User::class)->find($id);
        if (!$usuario) {
            throw $this->createNotFoundException(
                'Ningún usuario coincide con la id '.$id
            );
        }
        $em->remove($usuario);
        $em->flush();

        return $this->redirectToRoute('admin_usuarios');
    }

    /**
     * @Route("/admin/crearUsuario", name="admin_crearUsuario")
     */
    public function crearUsuarioAction(Request $request)
    {
        // 1) Build the form
        $user = new User();
        $roles = $this->getDoctrine()->getRepository(Role::class)->findAll();
        $array = array();
        foreach ($roles as $role) {
          $array[$role->getRole()]=$role->getRole();
        }
        $form = $this->createForm(UserType::class, $user, array('roles' => $array));

        // 2) Handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) Guardar el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('ven_a_lamu');
        }

        return $this->render(
            '@User/Default/crearUsuario.html.twig',
            array('form' => $form->createView())
        );
    }
}
