<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="produits")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);

        $produits = $repository->findAll();

        return $this->render('index.html.twig', [
            "produits"=>$produits
        ]);
    }

    /**
     * @Route("/produits/ajouter",name="produit_ajouter")
     */
    public function ajouter(Request $request)
    {
        $produit = new Produit();

        $formulaire = $this->createForm(ProduitType::class, $produit);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {

            $em = $this->getDoctrine()->getManager();


            $em->persist($produit);

            $em->flush();


            return $this->redirectToRoute("produits");
        }

        return $this->render('formulaire.html.twig', [
            "formulaire" => $formulaire->createView()
            , "h1" => "Ajouter un produit"
        ]);
    }

    /**
     * @Route("/produits/modifier/{id}",name="produit_modifier")
     */
    public function modifier(Request $request, $id)
    {

        $repository=$this->getDoctrine()->getRepository(Produit::class);
        $produit=$repository->find($id);


        $formulaire = $this->createForm(ProduitType::class, $produit);


        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {

            $em = $this->getDoctrine()->getManager();


            $em->persist($produit);

            $em->flush();


            return $this->redirectToRoute("produits");
        }

        return $this->render('formulaire.html.twig', [
            "formulaire" => $formulaire->createView()
            , "h1" => "Modifier le produit ".$produit->getNom()
        ]);
    }
}

