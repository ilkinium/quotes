<?php

namespace App\Controller;

use App\Entity\QuoteType;
use App\Form\QuoteTypeType;
use App\Repository\QuoteTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quote/type")
 */
class QuoteTypeController extends AbstractController
{
    /**
     * @Route("/", name="quote_type_index", methods={"GET"})
     */
    public function index(QuoteTypeRepository $quoteTypeRepository): Response
    {
        return $this->render('quote_type/index.html.twig', [
            'quote_types' => $quoteTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="quote_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $quoteType = new QuoteType();
        $form = $this->createForm(QuoteTypeType::class, $quoteType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quoteType);
            $entityManager->flush();

            return $this->redirectToRoute('quote_type_index');
        }

        return $this->render('quote_type/new.html.twig', [
            'quote_type' => $quoteType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quote_type_show", methods={"GET"})
     */
    public function show(QuoteType $quoteType): Response
    {
        return $this->render('quote_type/show.html.twig', [
            'quote_type' => $quoteType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="quote_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, QuoteType $quoteType): Response
    {
        $form = $this->createForm(QuoteTypeType::class, $quoteType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quote_type_index');
        }

        return $this->render('quote_type/edit.html.twig', [
            'quote_type' => $quoteType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quote_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, QuoteType $quoteType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quoteType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($quoteType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('quote_type_index');
    }
}
