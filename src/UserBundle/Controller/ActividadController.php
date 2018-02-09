<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use PrincipalBundle\Entity\ActividadTurista;
use PrincipalBundle\Form\ActividadTuristaType;

class ActividadController extends Controller
{
    /**
     * @Route("/admin/crearActividadTurista", name="crearActividadTurista")
     */
    public function crearActividadTuristaAction(Request $request)
    {
      // 1) Build the form
      $actividadTurista = new ActividadTurista();
      $form = $this->createForm(ActividadTuristaType::class, $actividadTurista);

      // 2) Handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {

          $actividadTurista = $form->getData();
          // Guardar vehiculo
          $em = $this->getDoctrine()->getManager();
          $em->persist($actividadTurista);
          $em->flush();

          return $this->redirectToRoute('admin_actividades', array('tipo' => "turista"));
      }

      return $this->render('@User/Admin/crearActividadTurista.html.twig',
          array('form' => $form->createView())
      );
    }

    /**
     * @Route("/admin/modificarActividadTurista/id={id}", name="modificar_actividad_turista")
     */
    public function modificarVehiculoAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadTurista = $em->getRepository(ActividadTurista::class)->find($id);

        if (!$actividadTurista) {
            throw $this->createNotFoundException(
                'Ninguna actividad coincide con la id '.$id
            );
        }

        $form = $this->createForm(ActividadTuristaType::class, $actividadTurista);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
          // $form->getData() holds the submitted values
          // but, the original `$actividadTurista` variable has also been updated
          $actividadTurista = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($actividadTurista);
          $em->flush();

          return $this->redirectToRoute('admin_actividades', array('tipo' => "turista"));
        }
        return $this->render('@User/Admin/modificarActividadTurista.html.twig',
            array('form' => $form->createView(), 'actividad'=>$actividadTurista));
    }

    /**
     * @Route("/admin/eliminarActividadTurista/id={id}", name="eliminar_actividad_turista")
     */
    public function eliminarActividadTuristaAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadTurista = $em->getRepository(ActividadTurista::class)->find($id);
        if (!$actividadTurista) {
            throw $this->createNotFoundException(
                'Ninguna actividad coincide con la id '.$id
            );
        }
        $em->remove($actividadTurista);
        $em->flush();

        return $this->redirectToRoute('admin_actividades', array('tipo' => "turista"));
    }

    /**
     * @Route("/admin/eliminarActividadVoluntario/id={id}", name="eliminar_actividad_voluntario")
     */
    public function eliminarActividadVoluntarioAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadVoluntario = $em->getRepository(ActividadVoluntario::class)->find($id);
        if (!$actividadVoluntario) {
            throw $this->createNotFoundException(
                'Ninguna actividad coincide con la id '.$id
            );
        }
        $em->remove($actividadVoluntario);
        $em->flush();

        return $this->redirectToRoute('personal', array('tipo' => "voluntario"));
    }
}
