<?php
namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use App\Entity\Contact;
use App\Form\ContactType;

class PagesController extends Controller {

    /**
     * @Route("/")
     * @param Environment $twig
     * @return Response
     */
    function indexAction (Environment $twig) {
        return new Response($twig->render('pages/home.html.twig', array('title' => 'Accueil')));
    }

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param Environment $twig
     * @return Response
     */
    function contactAction (Environment $twig, Request $request) {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            var_dump($form->isSubmitted(), $form->isValid());
            // Actions à effectuer après validation du formulaire
            $this->get('session')->getFlashBag()->add('notice', "Merci, votre message a bien été pris en compte !");

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            //Envoi d'un mail
            $message = (new \Swift_Message($contact->getEmail()))
                ->setSubject('Contact PPC')
                ->setFrom($contact->getEmail())
                ->setTo('aurelien.rickman@gmail.com')
                ->setContentType("text/html")
                ->setBody(/*$this->renderView('app/mail/contact.html.twig', */array('contact' => $contact))
            ;

            $this->get('mailer')->send($message);

            // Redirection afin d'éviter le "re-posting"
            return $this->redirect($this->generateUrl('contact'));
        }

        return new Response($twig->render('pages/contact.html.twig', array(
            'title' => 'Contact',
            'form' => $form->createView()
        )));

        /**
         * @Route("/connexion", name="connexion")
         * @param Environment $twig
         * @return Response
         */
        function ConnexionAction (Environment $twig){

        }
    }
}