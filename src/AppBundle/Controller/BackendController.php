<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DescriptionGeneral;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BackendController extends Controller
{
    /**
     * @Route("/backend/dashboard", name="dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('backend/dashboard.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/contact", name="backend_contact")
     */
    public function contactAction() {

        $em = $this->getDoctrine()->getManager();
        $contacts = $this->getDoctrine()->getRepository('AppBundle:EmailInterested')->findAll();

        return $this->render('backend/contact.html.twig', array(
            'contacts'  => $contacts,
        ));
    }

    /**
     * @Route("/backend/descriptionGeneral", name="description_general")
     */
    public function descriptionGeneralAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $description = $this->getUser()->getDescriptionGeneral();


        if ($description == null) {
            $description = new DescriptionGeneral();
            $description->setDescriptionApp("Description de l'application");
            $description->setNomApp("Nom App");
            $this->getUser()->setDescriptionGeneral($description);
        }



        $editForm = $this->createForm('AppBundle\Form\DescriptionGeneralType', $description);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->persist($description);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('backend/descriptionGeneral.html.twig', array(
            '$description' => $description,
            'edit_form' => $editForm->createView(),
        ));

        return $this->render('backend/descriptionGeneral.html.twig');
    }



}
