<?php

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PrincipalBundle\Entity\Contacto;
use Symfony\Component\HttpFoundation\Request;
use PrincipalBundle\Form\ContactoType;


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
     * @Route("/{_locale}/contacto", name="contacto")
     */
    public function contactoAction(Request $request)
    {
        //dentro de la función añadimos un objeto de nuestra Entity:
        $cont = new Contacto();
        $form= $this->createForm(ContactoType::class,$cont);/*Aquí le añadimos la variable del objeto*/
        $form->handleRequest($request);
        //A continuación viene una comprobación si se aprieta el botón de enviar:
        if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $entity = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $DB = $this->getDoctrine()->getManager();
          $DB->persist($entity);
          $DB->flush();

          // mensaje flash aparece al enviar los datos desde contacto
          $this->addFlash(
            'notice',
            'Datos enviados correctamente!'
        );

          //Enviar email al soporte
          $message = (new \Swift_Message($entity->getAsunto()))
            ->setFrom('null@gmail.com')
            ->setTo('one.day.yes1@gmail.com')
            ->setBody(
              $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                '@Principal/Default/emailContacto.html.twig',
                array('entity' => $entity)
              ),
              'text/html'
            );

            $this->get('mailer')->send($message);

          return $this->redirectToRoute('contacto');
        }
        //en el caso de que no haya validacion se mostrara el formulario
        return $this->render('@Principal/Default/contacto.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/{_locale}/galeria", name="galeria")
     */
    public function galeriaAction()
    {
        return $this->render('@Principal/Default/galeria.html.twig');
    }
}
