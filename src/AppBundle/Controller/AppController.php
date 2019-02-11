<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EmailInterested;
use AppBundle\Entity\User;
use AppBundle\Form\EmailInterestedType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends Controller
{

    /**
     * @Route("/{username}", name="homepage", defaults={"username":"demo"})
     */
    public function viewportfolio(User $user, Request $request)
    {
        $lienSociaux = $user->getLienSociaux();
        $listeProjet = $this->getDoctrine()->getRepository('AppBundle:Projet')->findBy(array("user" => $user->getId()));
        $description = $user->getDescriptionGeneral();
        $competence = $this->getDoctrine()->getRepository('AppBundle:CompetenceUser')->findBy(array("user" => $user->getId()));


        $email = new EmailInterested($user);
        $form = $this->createForm(EmailInterestedType::class, $email);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($email);
            $em->flush();

//            $email = new EmailInterested($user);
//            $form = $this->createForm(EmailInterestedType::class, $email);
        }

        return $this->render('app/homepage.html.twig', array(
            'user' => $user,
            'lienSociaux' => $lienSociaux,
            'form' => $form->createView(),
            'listeProjet' => $listeProjet,
            'description' => $description,
            'competences'   => $competence,
        ));
    }

    /**
     * @Route("/backend/mesCompetence", name="mes_competence")
     */
    public function viewPage(){
        $comp = null;
        return $this->render('competence/mesCompetence.html.twig', array(
            'competences' => $comp,
        ));
    }


}
