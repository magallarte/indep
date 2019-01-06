<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Form\KidType;
use App\Repository\KidRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kid")
 */
class KidController extends AbstractController
{
    /**
     * @Route("/", name="kid_index", methods={"GET"})
     */
    public function index(KidRepository $kidRepository): Response
    {
        return $this->render('kid/index.html.twig', [
            'kids' => $kidRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="kid_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kid = new Kid();
        $form = $this->createForm(KidType::class, $kid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kid);
            $entityManager->flush();

            return $this->redirectToRoute('kid_index');
        }

        return $this->render('kid/new.html.twig', [
            'kid' => $kid,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kid_show", methods={"GET"})
     */
    public function show(Kid $kid): Response
    {
        return $this->render('kid/show.html.twig', [
            'kid' => $kid,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kid_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Kid $kid): Response
    {
        $form = $this->createForm(KidType::class, $kid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kid_index', [
                'id' => $kid->getId(),
            ]);
        }

        return $this->render('kid/edit.html.twig', [
            'kid' => $kid,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kid_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Kid $kid): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kid->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kid);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kid_index');
    }
}
