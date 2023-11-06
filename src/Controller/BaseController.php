<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AppartementType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Appartement;
use Doctrine\ORM\EntityManagerInterface;


class BaseController extends AbstractController
{
 #[Route('/', name: 'app_accueil')] // / est l’URL de la page, name est le nom de la route
 public function index(): Response
 {
 return $this->render('base/index.html.twig', [ // render est la fonction qui va chercher le fichier TWIG pour l’afficher
 //'controller_name' => 'BaseController', // Le contrôleur donne à la vue une variable dont le contenu est BaseController, cela nous ne servira pas, nous l’enlèverons un peu plus loin
 ]);
 }

 #[Route('/appart', name: 'app_appart')] // / est l’URL de la page, name est le nom de la route
 public function appart(Request $request, EntityManagerInterface $em): Response
 {
    $appart = new Appartement();
    $form = $this->createForm(AppartementType::class, $appart);
    if($request->isMethod('POST')){
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            $em->persist($appart);
            $em->flush();
            $this->addFlash('notice','Appartement ajouté');
            return $this->redirectToRoute('app_appart');

        }
        }       
    return $this->render('base/appart.html.twig', [ 'form' => $form->createView()
 ]);
 }
}
