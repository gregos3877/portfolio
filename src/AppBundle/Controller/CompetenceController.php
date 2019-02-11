<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Competence;
use AppBundle\Entity\CompetenceUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Competence controller.
 *
 * @Route("/backend/competence")
 */
class CompetenceController extends Controller
{
//    /**
//     * Lists all competence entities.
//     *
//     * @Route("/", name="competence_index")
//     * @Method("GET")
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $competences = $em->getRepository('AppBundle:Competence')->findAll();
//
//        return $this->render('competence/index.html.twig', array(
//            'competences' => $competences,
//        ));
//    }

    /**
     * Lists all competence entities.
     *
     * @Route("/", name="mes_competences")
     * @Method("GET")
     */
    public function mesCompetencesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competences = $em->getRepository('AppBundle:CompetenceUser')->findBy(array("user" => $this->getUser()));
        return $this->render('competence/mesCompetences.html.twig', array(
            'competences' => $competences,
        ));
    }

//    /**
//     * Creates a new competence entity.
//     *
//     * @Route("/new", name="competence_new")
//     * @Method({"GET", "POST"})
//     */
//    public function newAction(Request $request)
//    {
//        $competence = new Competence();
//        $form = $this->createForm('AppBundle\Form\CompetenceType', $competence);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($competence);
//            $em->flush();
//
//            return $this->redirectToRoute('competence_show', array('id' => $competence->getId()));
//        }
//
//        return $this->render('competence/new.html.twig', array(
//            'competence' => $competence,
//            'form' => $form->createView(),
//        ));
//    }
    /**
     * Creates a new competence entity.
     *
     * @Route("/new", name="competence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $competence = new CompetenceUser();
        $form = $this->createForm('AppBundle\Form\CompetenceUserType', $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            dump($competence);
            $competence->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($competence);
            $em->flush();

            return $this->redirectToRoute('mes_competences');
        }

        return $this->render('competence/new.html.twig', array(
            'competence' => $competence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competence entity.
     *
     * @Route("/{id}/edit", name="competence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CompetenceUser $competence)
    {
        $editForm = $this->createForm('AppBundle\Form\CompetenceUserType', $competence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mes_competences');
        }

        return $this->render('competence/edit.html.twig', array(
            'competence' => $competence,
            'edit_form' => $editForm->createView(),
        ));
    }


    /**
     * @Route("/remove/{id}", name="remove_competence")
     */
    public function removeCompetence(CompetenceUSer $comptenceUSer)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($comptenceUSer);
        $em->flush();

        return $this->redirectToRoute('mes_competences');
    }

}
