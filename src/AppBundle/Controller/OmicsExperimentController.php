<?php
// src/AppBundle/Controller/OmicsExperimentController.php
namespace AppBundle\Controller;

use AppBundle\Entity\OmicsExperiment;
use AppBundle\Entity\Status;
use AppBundle\Form\OmicsExperimentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

// TODO: deleteAction should be implemented.

class OmicsExperimentController extends Controller {
    /**
     * @Route("/omics_experiment/index", name="omics_experiment_index")
     */
    public function indexAction() {
        // Grab all experiments from database and hand them to template.
        $repository = $this->getDoctrine()->getRepository('AppBundle:OmicsExperiment');
        $omics_experiments = $repository->findAll();
        return $this->render('omics_experiment/index.html.twig',['omics_experiments' => $omics_experiments]);
    }

    /**
     * @Route("/omics_experiment/new", name="omics_experiment_new")
     */
    public function newAction(Request $request) {
        $omics_experiment = new OmicsExperiment();

        $em = $this->getDoctrine()->getManager();
        $exp_type_relations = $em->getRepository('AppBundle:OmicsExperimentTypeStrings')->getExpTypeSubTypeRelations();

        $form = $this->createForm(OmicsExperimentType::class, $omics_experiment);

        $form->handleRequest($request);

        // On submission.
        if ($form->isValid()) {
            $em->persist($omics_experiment);
            $em->flush();
            return $this->redirectToRoute('omics_experiment_index');
        }

        return $this->render('omics_experiment/form.html.twig', array('form' => $form->createView(), 'select_relations' =>  $exp_type_relations));
    }

    /**
     * @Route("/omics_experiment/show/{id}", name="omics_experiment_show")
     * TODO: Not sure if nessesary (wasn't in last system).
     */
    public function showAction($id) {
        return $this->render('omics_experiment/show.html.twig');
    }

    /**
     * @Route("/omics_experiment/edit/{id}", name="omics_experiment_edit")
     */
    public function editAction(Request $request, $id) {
        $repository = $this->getDoctrine()->getRepository('AppBundle:OmicsExperiment');
        $omics_experiment = $repository->find($id);

        $em = $this->getDoctrine()->getManager();
        $exp_type_relations = $em->getRepository('AppBundle:OmicsExperimentTypeStrings')->getExpTypeSubTypeRelations();

        $form = $this->createForm(OmicsExperimentType::class, $omics_experiment);

        $form->handleRequest($request);

        // On submission.
        if ($form->isValid()) {
            $em->persist($omics_experiment);
            $em->flush();
            return $this->redirectToRoute('omics_experiment_index');
        }

        return $this->render('omics_experiment/form.html.twig', array('form' => $form->createView(), 'select_relations' =>  $exp_type_relations));
    }

    /**
     * @Route("omics_experiment/delete/{id}", name="omics_experiment_delete")
     */
    public function deleteAction(Request $request, $id) {
        $repository = $this->getDoctrine()->getRepository('AppBundle:OmicsExperiment');
        $omics_experiment = $repository->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($omics_experiment);
        $em->flush();

        $this->addFlash(
            'notice',
            '"' . $omics_experiment->getProjectName() . '" has successfully been deleted.'
        );

        return $this->redirectToRoute('omics_experiment_index');
    }

    /**
     * @Route("omics_experiment/delete/{id}", name="omics_experiment_delete")
     * @Method({"DELETE","GET"})
     *
    public function deleteAction(Request $request, $id) {

        $response = array(
            'success' => true,
            'message' => '',
            'html' => '',
        );

        $repository = $this->getDoctrine()->getRepository('AppBundle:OmicsExperiment');
        $omics_experiment = $repository->find($id);

        $form = $this->createDeleteForm($omics_experiment);
        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($omics_experiment);
                $em->flush();

                // Get response ready as per your need.
                $response['success'] = true;
                $response['message'] = 'Deleted Successfully!';
            } else {
                $response['success'] = false;
                $response['message'] = 'Sorry category could not be deleted!';
            }
            return new JsonResponse($response);
        }

        $render = $this->render('omics_experiment/delete_confirm.html.twig', array(
            'delete_form' => $form->createView(),
            'omics_experiment' => $omics_experiment,
        ));

        return $this->redirectToRoute('omics_experiment_index');
    }
     */

    /**
     * Creates a form to delete a testing entity.
     *
     * @param OmicsExperiment $omicsExperiment
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OmicsExperiment $omicsExperiment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('omics_experiment_delete', array('id' => $omicsExperiment->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}