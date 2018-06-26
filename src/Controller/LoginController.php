<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LoginType;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends  AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $form = $this->createForm(LoginType::class);
        return $this->render('login/login.html.twig', [
            'controller_name' => 'LoginController',
            'our_form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request,AuthenticationUtils $authenticationUtils,AuthorizationCheckerInterface $authChecker)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        if (true === $authChecker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin/dashboard');
        }
        if (true === $authChecker->isGranted('ROLE_PARENT')) {
            return $this->redirectToRoute('parents');
        }
        if (true === $authChecker->isGranted('ROLE_ELEVE')) {
            return $this->redirectToRoute('eleve');
        }
        if (true === $authChecker->isGranted('ROLE_PROF')) {
            return $this->redirectToRoute('professeur');
        }
        else
        return $this->render('login/index.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }



    /**
     * @Route("/parents",name="parents")
     */
    public function parentAction(AuthorizationCheckerInterface $authChecker)
    {


        return $this->render('parents.html.twig', array(

        ));



    }
    /**
     * @Route("/eleve",name="eleve")
     */
    public function eleveAction(AuthorizationCheckerInterface $authChecker)
    {


        return $this->render('eleves.html.twig', array(

        ));



    }
    /**
     * @Route("/professeur",name="professeur")
     */
    public function professeurAction(AuthorizationCheckerInterface $authChecker)
    {


        return $this->render('professeurs.html.twig', array(

        ));



    }
}
