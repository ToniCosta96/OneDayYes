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
     * @Route("/{_locale}/usuarios/registro", name="registro")
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
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 3.1) Guardar rol del usuario, fecha de creación y el código de validación
            $user->setRoles(["ROLE_USER"]);
            $user->setFechaCreacion(new \DateTime("now"));
            $user->setCodigoValidacion(strlen($user->getUsername()).random_int(100, 9999));

            // 4) Guardar el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            //Enviar email al usuario que se registra
            $message = (new \Swift_Message('Bienvenido OneDayYes'))
              ->setFrom('null@gmail.com')
              ->setTo($user->getEmail())
              ->setBody(
                $this->renderView(
                  // app/Resources/views/Emails/registration.html.twig
                  '@User/Default/email.html.twig',
                  array('user' => $user)
                ),
                'text/html'
              );

              $this->get('mailer')->send($message);

            return $this->redirectToRoute('index');
        }

        return $this->render(
            '@User/Default/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/admin/crearUsuario", name="admin_crearUsuario")
     */
    public function crearUsuarioAction(Request $request)
    {
        // 1) Build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) Handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 3.1) Guardar fecha de creación
            $user->setFechaCreacion(new \DateTime("now"));

            // 4) Guardar el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('admin_usuarios');
        }

        return $this->render(
            '@User/Admin/crearUsuario.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/admin/modificarUsuario/id={id}", name="admin_modificar_usuario")
     */
    public function modificarUsuarioAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'Ningún usuario coincide con la id '.$id
            );
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
          // $form->getData() holds the submitted values
          // but, the original `$user` variable has also been updated
          $user = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($user);
          $em->flush();

          return $this->redirectToRoute('admin_usuarios');
        }
        return $this->render('@User/Admin/modificarUsuario.html.twig',array('form' => $form->createView(),'usuario' => $user));
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
     * @Route("/usuarios/verificar/{id}/{hash}", name="verificar")
     */
    public function verificarUsuarioAction($id, $hash)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(User::class)->find($id);
        if ($usuario->getCodigoValidacion()==$hash){
          $usuario->setVerificado("1");
          $em->persist($usuario);
          $em->flush();
        }
        return $this->render('@User/Default/verificar.html.twig');
    }
}
