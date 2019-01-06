<?php

namespace App\Controller;

use App\Entity\SchoolLevel;
use App\Form\SchoolLevelType;
use App\Repository\SchoolLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/school/level")
 */
class SchoolLevelController extends AbstractController
{
    /**
     * @Route("/", name="school_level_index", methods={"GET"})
     */
    public function index(SchoolLevelRepository $schoolLevelRepository): Response
    {
        return $this->render('school_level/index.html.twig', [
            'school_levels' => $schoolLevelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="school_level_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $schoolLevel = new SchoolLevel();
        $form = $this->createForm(SchoolLevelType::class, $schoolLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($schoolLevel);
            $entityManager->flush();

            return $this->redirectToRoute('school_level_index');
        }

        return $this->render('school_level/new.html.twig', [
            'school_level' => $schoolLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_level_show", methods={"GET"})
     */
    public function show(SchoolLevel $schoolLevel): Response
    {
        return $this->render('school_level/show.html.twig', [
            'school_level' => $schoolLevel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="school_level_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SchoolLevel $schoolLevel): Response
    {
        $form = $this->createForm(SchoolLevelType::class, $schoolLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('school_level_index', [
                'id' => $schoolLevel->getId(),
            ]);
        }

        return $this->render('school_level/edit.html.twig', [
            'school_level' => $schoolLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_level_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SchoolLevel $schoolLevel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schoolLevel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($schoolLevel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('school_level_index');
    }
}
